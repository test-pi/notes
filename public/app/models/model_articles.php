<?php
class Model_Articles extends Model
{
   
    public function __construct()
    {
        parent::__construct();
    }
    public function get_data()
    {	
        $res = $this->my->query("SELECT *,CONCAT(SUBSTRING(text, 1, 250),'...') AS `text` FROM articles ORDER BY id DESC LIMIT 15");
        if(!$res)
        {
            $resAr = false;
        }
        elseif($res->num_rows > 0)
        {
            while($row = $res->fetch_array(MYSQLI_ASSOC))
            {
                $resAr[] = $row; 
            }
        }
        else
        {
            $resAr = null;
        }
        return $resAr;
    }
    
    public function bycategory($id)
    {
        $id = $this->my->real_escape_string($id);
        $res = $this->my->query("SELECT title,id,author,
                                        DATE_FORMAT(dt_create,'%d.%m.%Y %H:%i:%s') AS dt_create,
                                        CONCAT(SUBSTRING(text, 1, 250),'...') AS `text`
                                   FROM articles WHERE cat_id='{$id}'  ORDER BY id DESC LIMIT 0,15");
        if(!$res)
        {
            $resAr = false;
        }
        elseif($res->num_rows > 0)
        {
            while($row = $res->fetch_array(MYSQLI_ASSOC))
            {
                $resAr[] = $row; 
            }
        }
        else
        {
            $resAr = false;
        }
        return $resAr;
    }
    
    public function article($id)
    {
        $id = $this->my->real_escape_string($id);
        $res = $this->my->query("SELECT title,id,author,`text`,
                                        DATE_FORMAT(dt_create,'%d.%m.%Y %H:%i:%s') AS dt_create
                                   FROM articles WHERE id='{$id}'");
        if(!$res)
        {
            $resAr = false;
        }
        elseif($res->num_rows > 0)
        {
            $resAr = $res->fetch_array(MYSQLI_ASSOC);
        }
        else
        {
            $resAr = false;
        }
        return $resAr;
    }
}
?>