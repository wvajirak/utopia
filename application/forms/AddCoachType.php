<?php

class Application_Form_AddCoachType extends Zend_Form
{

    public function init()
    {
       $this->setName('addcoachtypeform')->setAction('add-coach-type');
       
        $typeID = new Zend_Form_Element_Hidden('type_id');
        $typeID->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
       
        $capacity = new Zend_Form_Element_Text('capacity');
        $capacity->setLabel('Capacity')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add CoachType')
               ->setLabel('Add');
        
        $this->addElements(array(
                $typeID, $capacity, $submit      
        ));
    }


}

