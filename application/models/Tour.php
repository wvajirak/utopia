<?php

class Application_Model_Tour
{
    protected $_tour_id;
    protected $_tour_title;
    protected $_coach_id;

 
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
            throw new Exception('Invalid tours property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid tours property');
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
 
    public function setTourID($tour_id)
    {
        $this->_tour_id = (string) $tour_id;
        return $this;
    }
 
    public function getTourID()
    {
        return $this->_tour_id;
    }
 
    public function setTourTitle($tour_title)
    {
        $this->_tour_title = (string) $tour_title;
        return $this;
    }
 
    public function getTourTitle()
    {
        return $this->_tour_title;
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
 
  
}

