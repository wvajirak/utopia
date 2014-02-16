<?php

class Application_Form_ActiveTours extends Zend_Form
{

    public function init()
    {
       $this->setName('addactivetourform')->setAction('add-active-tours');
       
        $active_tour_id = new Zend_Form_Element_Hidden('active_tour_id');
        $active_tour_id->addFilter('Int')
                  ->setRequired(true)->addValidator('NotEmpty');
       
        $tour_id = new Application_Form_TourIDSelector('tour_id');
        $tour_id->setLabel('Tour')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $date_id = new Application_Form_DateIDSelector('date_id ');
        $date_id ->setLabel('Tour Date')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton')
               ->setValue('Add Active_tours')
               ->setLabel('Add');
        
        $this->addElements(array(
                $active_tour_id, $tour_id, $date_id , $submit      
        ));
    }


}

