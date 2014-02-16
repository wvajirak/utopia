<?php

class Application_Model_DbTable_Coaches extends Zend_Db_Table_Abstract
{

    protected $_name = 'coaches';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('coach_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
       
        return $row->toArray();
    }
    
    public function deleteCoach($id){
         $this->delete('coach_id =' . (int)$id);
    }
    
    public function save($coach_id, $coach_reg, $type_id){
         $data = array(
            'coach_id' => $coach_id,
            'coach_reg' => $coach_reg,
            'type_id' => $type_id,        
        );
         
        // if id is null then insert
        if (null === $coach_id) {
            $record_id = $this->insert($data);
        }
        //update
        else{
            
            $row = $this->fetchRow('coach_id = ' . $coach_id);
            if($row){
                $this->update($data, 'coach_id = '. (int)$coach_id);
            $record_id = $coach_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }

}

