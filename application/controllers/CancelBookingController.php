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
        // action body
    }


}



