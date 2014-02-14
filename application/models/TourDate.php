<?php

class Application_Model_TourDate
{
    protected $_date_id;
    protected $_tour_dt;
 
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
            throw new Exception('Invalid dates property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid dates property');
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
 
    public function setTourDate($tour_dt)
    {
        $this->_tour_dt = $tour_dt;
        return $this;
    }
 
    public function getTourDate()
    {
        return $this->_tour_dt;
    }
 
    public function setDateID($date_id)
    {
        $this->_date_id = $date_id;
        return $this;
    }
 
    public function getDateID()
    {
        return $this->_date_id;
    }

}

