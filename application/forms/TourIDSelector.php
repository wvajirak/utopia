<?php

class Application_Form_TourIDSelector extends Zend_Form_Element_Select {
    public function init() {
        $tours_db = new Application_Model_DbTable_Tours();
        $select = Application_Service_QueryHelper::remainingTours();
        foreach ($select->query()->fetchAll() as $tour) {
            $this->addMultiOption($tour['tour_id'], $tour['tour_title']);
        }
    }
}