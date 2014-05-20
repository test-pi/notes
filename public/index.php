<?php
ini_set('display_errors',1);
$mainPath = explode("/",$_SERVER['REQUEST_URI']);
define("HOST","http://".$_SERVER['HTTP_HOST']);
define("TEMPLATE","template_view.php");
header("Content-Type: text/html; charset=utf-8");
require_once "app/bootstrap.php";


echo "<pre>";
print_r($_SERVER);
echo "</pre>";
//http://colorscheme.ru/#1651AgMRRIIyK
?> 
