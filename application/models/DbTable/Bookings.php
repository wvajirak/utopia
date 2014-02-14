<?php

class Application_Model_DbTable_Bookings extends Zend_Db_Table_Abstract
{

    protected $_name = 'bookings';

    public function find($id){
        $id = (int)$id;
        $row = $this->fetchRow('booking_id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        //die(print_r($row->toArray)); 
        return $row->toArray();
    }
    
    public function delete($id){
         $this->delete('booking_id =' . (int)$id);
    }
    
    public function save($booking_id, $customer_id, $active_tour_id,$booking_dt){
         $data = array(
            'booking_id' => $booking_id,
            'customer_id' => $customer_id,
            'active_tour_id' => $active_tour_id,
            'booking_dt' => $booking_dt,          
        );
         
        
        // if id is null then insert
        if (null === $booking_id) {
            $record_id = $this->insert($data);
        }
        //update
        else{
            
            $row = $this->fetchRow('booking_id = ' . $booking_id);
            if($row){
                $this->update($data, 'booking_id = '. (int)$booking_id);
            $record_id = $booking_id;
            }
            else{
                throw new Exception("Could not find row $id");
            }
        }
        
        return $record_id;
    }
}

