<?php
class Base
{
    /**
     * @db - соединение с базой
     * @max_time - максимальное количество времени для проверки в секундах
     */
    private $db;
    private $max_time = 300;
    
    /**
     * Открываю соединение с базой
     */
    function __construct()
    {
        $this->db = new SQLite3("online.db");
        $sql = "CREATE TABLE IF NOT EXISTS online(ip VARCHAR(50),time_online INT UNSIGNED)";
        $this->db->query($sql);
    }  
    /**
     * Для получения количества людей активных на сайте.
     */
    final public function getCount()
    {
        $time = time() - $this->max_time;
        $sql = "SELECT COUNT(*) FROM online WHERE time_online>".$time;
        $res = $this->db->query($sql);
        $row = $res->fetchArray();
        echo $row[0];
    }  
    /**
     * Запись нового времени при каждом it по сайту
     */
    final public function setNewTime()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = time();
        $sql = "SELECT COUNT(ip) FROM online WHERE ip='{$ip}'";
        $res = $this->db->query($sql);
        $row = $res->fetchArray();
        if($row[0] > 0)
        {
            $sql = "UPDATE online SET time_online='{$time}' WHERE ip='{$ip}'";
        }
        else
        {
            $sql = "INSERT INTO online VALUES('{$ip}','{$time}')";
        }
        $this->db->query($sql);
    }
    

}
?>