<?php

class Application_Form_Booking extends Zend_Form
{

    public function init()
    {
        $this->setName('bookingform')->setAction('book');
        
        $activeTourID = new Zend_Form_Element_Hidden('active_tour_id');
        $activeTourID->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
        
       
        $name_f = new Zend_Form_Element_Text('name_f');
        $name_f->setLabel('First Name')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $name_l = new Zend_Form_Element_Text('name_l');
        $name_l->setLabel('Last Name')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E Mail')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('EmailAddress');
        
        $phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Phone')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
//            ->addValidator('EmailAddress');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add Album')
               ->setLabel('Book');
        
        $this->addElements(array(
                $activeTourID, $name_f, $name_l, $email, $phone, $submit      
        ));
        
    }


}

