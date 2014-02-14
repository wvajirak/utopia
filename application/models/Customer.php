<?php

class Application_Model_Customer
{

    protected $_customer_id;
    protected $_name_f;
    protected $_name_l;
    protected $_email;
    protected $_phone;
    
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
            throw new Exception('Invalid customer property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid customer property');
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
 
    public function setCustomerID($customer_id)
    {
        $this->_customer_id = (string) $customer_id;
        return $this;
    }
 
    public function getCustomerID()
    {
        return $this->_customer_id;
    }
    
    public function setNameF($name_f)
    {
        $this->_name_f = (string) $name_f;
        return $this;
    }
 
    public function getNameF()
    {
        return $this->_name_f;
    }
    
    public function setNameL($name_l)
    {
        $this->_name_l = (string) $name_l;
        return $this;
    }
 
    public function getNameL()
    {
        return $this->_name_l;
    }
 
    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }
 
    public function getEmail()
    {
        return $this->_email;
    }
 
    public function setPhone($phone)
    {
        $this->_phone = $phone;
        return $this;
    }
 
    public function getPhone()
    {
        return $this->_phone;
    }

}

