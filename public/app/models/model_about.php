<?php
class Model_About extends Model
{
   
    public function __construct()
    {
        parent::__construct();
    }
    public function get_data()
    {	
        $res = $this->my->query("SELECT *,CONCAT(SUBSTRING(text, 1, 250),'...') AS `text` FROM articles ORDER BY id DESC LIMIT 15");
        if($res->num_rows > 0)
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
}
?>