<?php
class View
{
    private $model;
    function __construct()
    {
        $this->model = new Model;
    }
    function generate_page($content_view, $data = null)
    {
        echo "<!DOCTYPE html>
        <html lang='ru'>
        <head>
            <meta http-equiv='content-type' content='text/html; charset=utf-8'>
            <title>{$data['title']}</title>
            <link rel='shortcut icon' href='images/ico.ico' type='image/x-icon'>
            <link rel='stylesheet' type='text/css' href='".HOST."/css/style.css'>
            <!--
            <script src='/js/jquery-1.6.2.js' type='text/javascript'></script>
            -->
        </head>
        <body>
        <table class='mainCarcas' cellpadding='0' cellspacing='0'>
            <tr>
                <td colspan='2'>";
                require_once 'app/block/header.php';
         echo "</td>
            </tr>
            <tr class='Middle'>
                <td class='leftMenu'>";
                    $this->left_menu();
         echo  "</td>
                <td class='content'>";
                include 'app/views/'.$content_view; 
           echo "</td>
            </tr>
            <tr>
                <td colspan='2'>";
                require_once 'app/block/footer.php';
           echo "</td>
            </tr>
        </table>
        </body>
        </html>";
    }
    
    private function left_menu()
    {
        echo "
        <div>
            <ul class='menuList'>
                <li><a href='".HOST."'>Главная</a></li>
                <li class='dopMenu'><a href='".HOST."/articles'>Категории</a>";
                $cat = $this->model->category();
                if($cat)
                {
                    echo "<div>
                            <ul>";
                            foreach($cat as $val)
                            {
                                echo "<li><a href='".HOST."/articles/category/{$val['cat_id']}'>{$val['cat_title']}</a></li>";
                            }
                    echo   "</ul>
                         </div>";
                }
                
                             
              
        echo "  </li>
                <li><a href='".HOST."/about'>Обо мне</a></li>
            </ul>
        </div>";
    } 
    
    
}	
?>