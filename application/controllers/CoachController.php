<?php

class CoachController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    }

    public function addCoachAction()
    {
        $form = new Application_Form_AddCoach();
         
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                //Application_Service_QueryHelper::save($form);
                
                $coach_db = new Application_Model_DbTable_Coaches();
                $customer_id = $coach_db->save( null,
                                         $form->getValue('coach_reg'),
                                         $form->getValue('type_id'));
                
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/coach/coach");  
        }
        
         $this->view->form = $form;

    }

    public function coachAction()
    {
        $coach_db = new Application_Model_DbTable_Coaches();
        $this->view->rows = $coach_db->fetchAll();
    }

    public function coachTypeAction()
    {
        $coachType_db = new Application_Model_DbTable_CoachTypes();
        $this->view->rows = $coachType_db->fetchAll();
    }

    public function addCoachTypeAction()
    {
        $form = new Application_Form_AddCoachType();
         
        if ($this->getRequest ()->isPost ()) {    	
            $formData = $this->getRequest ()->getPost ();
           // die(print_r($formData));
            if ($form->isValid($formData)) {
            
                //Application_Service_QueryHelper::save($form);
                
                $coachType_db = new Application_Model_DbTable_CoachTypes();
                $customer_id = $coachType_db->save( null,
                                                   $form->getValue('capacity'));
                
            } else {
                
                die("Form is invalid");
                
            }
                                
            $this->redirect("/coach/coach-type");  
        }
        
         $this->view->form = $form;

    }

    public function editCoachTypeAction()
    {
        $type_id = (int) $this->getParam('id',0);
        $form = new Application_Form_AddCoachType();
        $coachType_db = new Application_Model_DbTable_CoachTypes();
        
        if ($this->getRequest ()->isPost ()) {
            $formData = $this->getRequest ()->getPost ();
          
            if ($form->isValid($formData)) {
            
                $customer_id = $coachType_db->save( 
                                         $form->getValue('type_id'),
                                         $form->getValue('capacity'));
            } else {
                die("Form is invalid");   
            }
                                
            $this->redirect("/coach/coach-type");  
        }
        else {
           
            $row = $coachType_db->find($type_id);
            if($row){
                $form->populate(array(
                                'type_id'=> $type_id,
                                'capacity'=> $row['capacity']));
            }
            else{
                throw new Exception("Could not find row $type_id");
            }
        }
         $this->view->form = $form;
    }

    public function editCoachAction()
    {
        $coach_id = (int) $this->getParam('id',0);
        $form = new Application_Form_AddCoach();
        $coach_db = new Application_Model_DbTable_Coaches();
        
        if ($this->getRequest ()->isPost ()) {
            $formData = $this->getRequest ()->getPost ();
          
            if ($form->isValid($formData)) {
            
                $customer_id = $coach_db->save( 
                                         $form->getValue('coach_id'),
                                         $form->getValue('coach_reg'),
                                         $form->getValue('type_id'));
            } else {
                die("Form is invalid");   
            }
                                
            $this->redirect("/coach/coach");  
        }
        else {
           
            $row = $coach_db->find($coach_id);
            if($row){
                $form->populate(array(
                                'coach_id'=> $coach_id,
                                'coach_reg'=> $row['coach_reg'],
                                'type_id'=> $row['type_id']));
            }
            else{
                throw new Exception("Could not find row $coach_id");
            }
        }
         $this->view->form = $form;
    }

    public function deleteCoachAction()
    {
        $coach_id = (int) $this->getParam('id',0);
        $coach_db = new Application_Model_DbTable_Coaches();
        $row = $coach_db->find($coach_id);
        if($row){
           // die("$booking_id");
            $coach_db->deleteCoach($coach_id);

            
        }else{
            throw new Exception("Could not find row $coach_id");
        }
        
        $this->redirect("/coach/coach"); 
    }

    public function deleteCoachTypeAction()
    {
        $type_id = (int) $this->getParam('id',0);
        $coachType_db = new Application_Model_DbTable_CoachTypes();
        $row = $coachType_db->find($type_id);
        if($row){
           // die("$booking_id");
            $coachType_db->deleteCoachType($type_id);

            
        }else{
            throw new Exception("Could not find row $type_id");
        }
        
        $this->redirect("/coach/coach-type"); 
    }


}

















