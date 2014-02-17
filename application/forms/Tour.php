<?php

class Application_Form_Tour extends Zend_Form
{

    public function init()
    {
        $this->setName('tourform')->setAction('add-tours');
        
        $tour_id = new Zend_Form_Element_Hidden('tour_id');
        $tour_id->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
        
       
        $tour_title = new Zend_Form_Element_Text('tour_title');
        $tour_title->setLabel('Tour Title')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $coach_id = new Application_Form_CoachSelector('coach_id');
        $coach_id->setLabel('Coach ID')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add tour')
               ->setLabel('Add');
        
        $this->addElements(array(
                $tour_id, $tour_title, $coach_id, $submit      
        ));
    }


}

