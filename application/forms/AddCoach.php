<?php

class Application_Form_AddCoach extends Zend_Form
{

    public function init()
    {
       $this->setName('addcoachform')->setAction('add-coach');
       
        $coachID = new Zend_Form_Element_Hidden('coach_id');
        $coachID->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
       
        $coach_reg = new Zend_Form_Element_Text('coach_reg');
        $coach_reg->setLabel('Coach Reg')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $type_id = new Application_Form_CoachTypeSelector('type_id');
        $type_id->setLabel('Coach Type')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add Coach')
               ->setLabel('Add');
        
        $this->addElements(array(
                $coachID, $coach_reg, $type_id, $submit      
        ));
    }


}

