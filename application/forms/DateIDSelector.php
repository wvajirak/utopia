<?php

class Application_Form_DateIDSelector extends Zend_Form_Element_Select {
    public function init() { 
        $select = Application_Service_QueryHelper::remainingDates();
        foreach ($select->query()->fetchAll() as $date) {
            $this->addMultiOption($date['date_id'], $date['tour_dt']);
        }
    }
}
