<?php

class Application_Model_ActiveTour
{
    protected $_active_tour_id;
    protected $_tour_id;
    protected $_date_id;
 
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
            throw new Exception('Invalid active_tours property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid active_tours property');
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
 
    public function setActiveTourID($active_tour_id)
    {
        $this->_active_tour_id = $active_tour_id;
        return $this;
    }
 
    public function getActiveTourID()
    {
        return $this->_active_tour_id;
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

