<?php

class Application_Model_DbTable_TourDates extends Zend_Db_Table_Abstract
{

    protected $_name = 'dates';
    
    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('date_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
       
        return $row->toArray();
    }
    
    public function delete($id){
         $this->delete('date_id =' . (int)$id);
    }
    
    public function save($date_id, $tour_dt){
         $data = array(
            'date_id' => $date_id,
            'tour_dt' => $tour_dt,          
        );
         
        
        // if id is null then insert
        if (null === $date_id) {
            $record_id = $this->insert($data);
        }
        // update
        else{
            
            $row = $this->fetchRow('date_id = ' . $date_id);
            if($row){
                $this->update($data, 'date_id = '. (int)$date_id);
            $record_id = $date_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }

}

