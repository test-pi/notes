<?php
class Route
{
    static function start()
    {
        // контроллет и действия по умолчанию
        $controller_name = "Home";
        $action_name = "index";
        
        $routes = explode("/",$_SERVER['REQUEST_URI']);
            
        // получаем имя контроллера 2 на 1
        $contr = @trim($routes[1]);
        if(!empty($contr))
        {
            $controller_name = $contr;
        }    
        // полкчаем имя экшена 3 на 2
        $act = @trim($routes[2]);
        if(!empty($act))
        {
            $action_name = $act;
        }
            
        // добовляем пефиксы
        $model_name = "Model_".$controller_name;
        $controller_name = "Controller_".$controller_name;
        $action_name = "action_".$action_name;
        
        //подцпляем файл с классом модели
        $model_file = strtolower($model_name).".php";
        $model_path = "app/models/".$model_file;
        if(file_exists($model_path))
            include "app/models/".$model_file;
        
        //подцпляем файл с классом контроллера
        $controller_file = strtolower($controller_name).".php";
        $controller_path = "app/controllers/".$controller_file;
        
        if(file_exists($controller_path))
        {
            include "app/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }
        
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller,$action))
        {
            // вызываем действие контроллера
            define("CONTROLLER",$contr);
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    }
    
    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
?>