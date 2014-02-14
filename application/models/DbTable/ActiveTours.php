<?php

class Application_Model_DbTable_ActiveTours extends Zend_Db_Table_Abstract
{

    protected $_name = 'active_tours';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('active_tour_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        //die(print_r($row->toArray)); 
        return $row->toArray();
    }
    
    public function delete($id){
         $this->delete('active_tour_id =' . (int)$id);
    }
    
    public function save($active_tour_id, $tour_id, $date_id){
         $data = array(
            'active_tour_id' => $active_tour_id,
            'tour_id' => $tour_id,
            'date_id' => $date_id,
        );
         
        
        // if id is null then insert
        if (null === $active_tour_id) {
            $record_id = $this->insert($data);
        }
        // update
        else{
            $row = $this->fetchRow('active_tour_id = ' . $active_tour_id);
            if($row){
                $this->update($data, 'active_tour_id = '. (int)$active_tour_id);
                $record_id = $active_tour_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
    }
    

}

