<?php
class Model
{
    protected $my;
    
    function __construct()
    {
        $my = new mysqli("localhost","notes","notes123","notes");
        if($my->errno > 0)
            die();
        else
        {
            $this->my = $my;
        } 
                    
    }
    
    
    function category()
    {
        $sql = "SELECT * FROM categories";
        $res = $this->my->query($sql);
        if(!$res)
        {
            return false;
        }
        elseif($res->num_rows < 1)
        {
            return null;
        }
        else
        {
            while($row = $res->fetch_array(MYSQLI_ASSOC))
            {
                $resAr[] = $row;
            }
            return $resAr;
        }
    }
}
?>