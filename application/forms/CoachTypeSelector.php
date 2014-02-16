<?php

class Application_Form_CoachTypeSelector extends Zend_Form_Element_Select {
    public function init() {
        $coach_types_db = new Application_Model_DbTable_CoachTypes();
//        $this->addMultiOption(1, 'Please select...');
        foreach ($coach_types_db->fetchAll() as $coach_type) {
            $this->addMultiOption($coach_type['type_id'], "type " . $coach_type['type_id']);
        }
    }
}