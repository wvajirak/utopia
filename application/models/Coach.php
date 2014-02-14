<?php

class Application_Model_Coach
{

    protected $_cach_id;
    protected $_coach_reg;
    protected $_type_id;
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid coaches property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid coaches property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function setCoachID($coach_id)
    {
        $this->_coach_id = $coach_id;
        return $this;
    }
 
    public function getCoachID()
    {
        return $this->_coach_id;
    }
 
    public function setCoachReg($coach_reg)
    {
        $this->_coach_reg = (string) $coach_reg;
        return $this;
    }
 
    public function getCoachReg()
    {
        return $this->_coach_reg;
    }
 
    public function setTypeID($type_id)
    {
        $this->_type_id = $type_id;
        return $this;
    }
 
    public function getTypeID()
    {
        return $this->_type_id;
    }
 
}

