<?php
namespace ClasScheduler;

class BaseObject {
    
    public function __construct(){
        
    }
    
    /**
     * Get variable $var.
     * @param string $var
     * @return mixed
     */
    public function getVar ($var)
    {
        return $this->{$var};
    }
    
    /**
     * Set class variable to given value.
     * @param string $var
     * @param mixed $value
     * @return boolean
     */
    public function setVar ($var = "", $value = 0)
    {
        if (!isset($this->{"$var"}))
        {
            return false;
        } 
        
        $this->{"$var"} = $value;
        return true;
    }
    
    /**
     * 
     * @param array $varArray
     */
    public function setVar ($varArray = array())
    {
        foreach ($varArray as $var => $value) {
            if (isset($this->{"$var"}))
            {
                $this->{"$var"} = $value; 
            }
        }
        

    }
}