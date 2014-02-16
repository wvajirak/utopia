<?php

class TourController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

    }

    public function dateAction()
    {
        // action body
    }

    public function tourAction()
    {
        // action body
    }

    public function activeToursAction()
    {
        $active_tours_db = new Application_Model_DbTable_ActiveTours();
        $this->view->rows = $active_tours_db->fetchAll();
    }

    public function addActiveToursAction()
    {
        $form = new Application_Form_ActiveTours();
         
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                //Application_Service_QueryHelper::save($form);
                
                $active_tours_db = new Application_Model_DbTable_ActiveTours();
                $customer_id = $active_tours_db->save( null,
                                         $form->getValue('tour_id'),
                                         $form->getValue('date_id'));
                
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/tour/active-tours");  
        }
        
         $this->view->form = $form;

    }


}









