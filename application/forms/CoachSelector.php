<?php

class Application_Form_CoachSelector extends Zend_Form_Element_Select {
    public function init() {
        $coaches_db = new Application_Model_DbTable_Coaches();
//        $this->addMultiOption(1, 'Please select...');
        foreach ($coaches_db->fetchAll() as $coach) {
            $this->addMultiOption($coach['coach_id'], "type " . $coach['coach_reg']);
        }
    }
}
