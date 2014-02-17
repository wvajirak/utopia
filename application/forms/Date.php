<?php

class Application_Form_Date extends Zend_Form
{

    public function init()
    {
        $this->setName('dateform')->setAction('add-dates');
        
        $date_id = new Zend_Form_Element_Hidden('date_id');
        $date_id->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
        
       
        $tour_dt = new Zend_Form_Element_Text('tour_dt');
        $tour_dt->setLabel('Tour Date')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator(new Zend_Validate_Date(array('format' => 'yyyy-mm-dd')))
            ->setValue('yyyy-mm-dd');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add Date')
               ->setLabel('Add');
        
        $this->addElements(array(
                $date_id, $tour_dt, $submit      
        ));
    }


}

