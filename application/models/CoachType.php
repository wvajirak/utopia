<?php

class Application_Model_CoachType
{

    protected $_type_id;
    protected $_capacity;
    
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
            throw new Exception('Invalid coach_types property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid coach_types property');
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
    
    public function setTypeID($type_id)
    {
        $this->_type_id = $type_id;
        return $this;
    }
 
    public function getTypeID()
    {
        return $this->_type_id;
    }
    
    public function setCapacity($capacity)
    {
        $this->_capacity = $capacity;
        return $this;
    }
 
    public function getCapacity()
    {
        return $this->_capacity;
    }
}

