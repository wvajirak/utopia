<?php

class Application_Model_Booking
{

    protected $_booking_id;
    protected $_customer_id;
    protected $_active_tour_id;
    protected $_booking_dt;
 
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
            throw new Exception('Invalid bookings property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid bookings property');
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
 
    public function setBookingID($booking_id)
    {
        $this->_booking_id = (string) $booking_id;
        return $this;
    }
 
    public function getBookingID()
    {
        return $this->_booking_id;
    }
 
    public function setCustomerID($customer_id)
    {
        $this->_customer_id = (string) $customer_id;
        return $this;
    }
 
    public function getCustomerID()
    {
        return $this->_customer_id;
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
 
    public function setBookingDate($booking_dt)
    {
        $this->_booking_dt = (int) $booking_dt;
        return $this;
    }
 
    public function getBookingDate()
    {
        return $this->_booking_dt;
    }

}

