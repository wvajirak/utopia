<?php

class BookingController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $select = Application_Service_QueryHelper::availabilityQuery();
        $this->view->rows = $select->query()->fetchAll();
    }

    public function bookAction()
    {
        $active_tour_id = (int) $this->getParam('id',0);
        
//        $this->view->active_tour_id  = $active_tour_id;
        
        $form = new Application_Form_Booking();
        $form ->getElement('active_tour_id')->setValue($active_tour_id);
        
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                Application_Service_QueryHelper::save($form);
          
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/booking/index");  
        }
        
         $this->view->form = $form;

    }
    

}