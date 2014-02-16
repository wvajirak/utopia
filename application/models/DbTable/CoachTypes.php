<?php

class Application_Model_DbTable_CoachTypes extends Zend_Db_Table_Abstract
{

    protected $_name = 'coach_types';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('type_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
       
        return $row->toArray();
    }
    
    public function deleteCoachType($id){
         $this->delete('type_id =' . (int)$id);
    }
    
    public function save($type_id, $capacity){
         $data = array(
            'type_id' => $type_id,
            'capacity' => $capacity,          
        );
         
        
        // if id is null then insert
        if (null === $type_id) {
            $record_id = $this->insert($data);
        }
        // update
        else{
            
            $row = $this->fetchRow('type_id = ' . $type_id);
            if($row){
                $this->update($data, 'type_id = '. (int)$type_id);
            $record_id = $type_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }
}

