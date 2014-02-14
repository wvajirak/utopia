<?php

class Application_Model_DbTable_Customers extends Zend_Db_Table_Abstract
{

    protected $_name = 'customers';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('customer_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        //die(print_r($row->toArray)); 
        return $row->toArray();
    }
    
    public function delete($id){
         $this->delete('customer_id =' . (int)$id);
    }

    public function save($customer_id, $name_f, $name_l,$email, $phone){
         $data = array(
            'customer_id' => $customer_id,
            'name_f' => $name_f,
            'name_l' => $name_l,
            'email' => $email,
            'phone' => $phone,
        );
         
        
        // if id is null then insert
        if (null === $customer_id) {
            $record_id = $this->insert($data);
        }
        else{
            
            $row = $this->fetchRow('customer_id = ' . $customer_id);
            if($row){
                $this->update($data, 'customer_id = '. (int)$customer_id);
            $record_id = $customer_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }
    
}

