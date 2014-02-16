<?php

class CancelBookingController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $select = Application_Service_QueryHelper::bookingCustomerQuery();
        $this->view->rows = $select->query()->fetchAll();
    }

    public function cancelAction()
    {
        $booking_id = (int) $this->getParam('id',0);
        $booking_tb = new Application_Model_DbTable_Bookings();
        $row = $booking_tb->find($booking_id);
        if($row){
            $customer_id = $row['customer_id'];
           // die("$booking_id");
            $booking_tb->deleteBooking($booking_id);
            $customer_tb = new Application_Model_DbTable_Customers();
            $customer_tb->deleteCustomer($customer_id);
            
        }else{
            throw new Exception("Could not find row $booking_id");
        }
        
        $this->redirect("/cancel-booking/index"); 
    }

    public function editAction()
    {
        // action body
    }


}





