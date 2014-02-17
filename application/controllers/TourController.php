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
        $dates_db = new Application_Model_DbTable_TourDates();
        $this->view->rows = $dates_db->fetchAll();
    }

    public function tourAction()
    {
        $tours_db = new Application_Model_DbTable_Tours();
        $this->view->rows = $tours_db->fetchAll();
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

    public function addToursAction()
    {
         $form = new Application_Form_Tour();
         
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                //Application_Service_QueryHelper::save($form);
                
                $tours_db = new Application_Model_DbTable_Tours();
                $customer_id = $tours_db->save( null,
                                         $form->getValue('tour_title'),
                                         $form->getValue('coach_id'));
                
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/tour/tour");  
        }
        
         $this->view->form = $form;
    }

    public function editToursAction()
    {
        $tour_id = (int) $this->getParam('id',0);
        $form = new Application_Form_Tour();
        $tours_db = new Application_Model_DbTable_Tours();
        
        if ($this->getRequest ()->isPost ()) {
            $formData = $this->getRequest ()->getPost ();
          
            if ($form->isValid($formData)) {
            
                $customer_id = $tours_db->save( 
                                         $form->getValue('tour_id'),
                                         $form->getValue('tour_title'),
                                         $form->getValue('coach_id'));
            } else {
                die("Form is invalid");   
            }
                                
            $this->redirect("/tour/tour");  
        }
        else {
           
            $row = $tours_db->find($tour_id);
            if($row){
                $form->populate(array(
                                'tour_id'=> $tour_id,
                                'tour_title'=> $row['tour_title'],
                                'coach_id'=> $row['coach_id']));
            }
            else{
                throw new Exception("Could not find row $tour_id");
            }
        }
         $this->view->form = $form;
    }

    public function deleteToursAction()
    {
        $tour_id = (int) $this->getParam('id',0);
        $tours_db = new Application_Model_DbTable_Tours();
        $row = $tours_db->find($tour_id);
        if($row){
           // die("$booking_id");
            $tours_db->deleteTour($tour_id);

            
        }else{
            throw new Exception("Could not find row $tour_id");
        }
        
        $this->redirect("/tour/tour"); 
    }

    public function deleteDatesAction()
    {
        $date_id = (int) $this->getParam('id',0);
        $dates_db = new Application_Model_DbTable_TourDates();
        $row = $dates_db->find($date_id);
        if($row){
           // die("$booking_id");
            $dates_db->deleteTourDate($date_id);

            
        }else{
            throw new Exception("Could not find row $date_id");
        }
        
        $this->redirect("/tour/date"); 
    }

    public function addDatesAction()
    {
         $form = new Application_Form_Date();
         
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                //Application_Service_QueryHelper::save($form);
                
                $dates_db = new Application_Model_DbTable_TourDates();
                $customer_id = $dates_db->save( null,
                                         $form->getValue('tour_dt'));
                
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/tour/date");  
        }
        
         $this->view->form = $form;
    }

    public function editDatesAction()
    {
        $date_id = (int) $this->getParam('id',0);
        $form = new Application_Form_Date();
        $dates_db = new Application_Model_DbTable_TourDates();
        
        if ($this->getRequest ()->isPost ()) {
            $formData = $this->getRequest ()->getPost ();
          
            if ($form->isValid($formData)) {
            
                $customer_id = $dates_db->save( 
                                         $form->getValue('date_id'),
                                         $form->getValue('tour_dt'));
            } else {
                die("Form is invalid");   
            }
                                
            $this->redirect("/tour/date");  
        }
        else {
           
            $row = $dates_db->find($date_id);
            if($row){
                $form->populate(array(
                                'date_id'=> $date_id,
                                'tour_dt'=> $row['tour_dt']));
            }
            else{
                throw new Exception("Could not find row $date_id");
            }
        }
         $this->view->form = $form;
    }


}





















