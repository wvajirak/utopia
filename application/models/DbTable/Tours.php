<?php

class Application_Model_DbTable_Tours extends Zend_Db_Table_Abstract
{

    protected $_name = 'tours';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('tour_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
       
        return $row->toArray();
    }
    
    public function deleteTour($id){
         $this->delete('tour_id =' . (int)$id);
    }
    
     public function save($tour_id, $tour_title, $coach_id){
         $data = array(
            'tour_id' => $tour_id,
            'tour_title' => $tour_title,
            'coach_id' => $coach_id,        
        );
         
        // if id is null then insert
        if (null === $tour_id) {
            $record_id = $this->insert($data);
        }
        //update
        else{
            
            $row = $this->fetchRow('tour_id = ' . $tour_id);
            if($row){
                $this->update($data, 'tour_id = '. (int)$tour_id);
            $record_id = $tour_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }

}

