<?php
class Registry
{
    private $vars = array();
	function __construct()
	{
		echo "hello";
	}
    
    function set($key,$var)
    {
        if(isset($this->vars[$key]) == true)
        {
            throw new Exception('Unable to set var '.$key.'. Already set');
        }
        $this->vars[$key] = $var;
        return true;
    }
    
    function get()
    {
        if(isset($this->vars[$key]) == false)
        {
            return null;
        }
        return $this->vars[$key];
    }
    
    function remove($key)
    {
        unset($this->vars[$key]);
    }
}

?>