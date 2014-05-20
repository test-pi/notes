<?php
class Controller_Articles extends Controller
{
    function __construct()
    {
        $this->model = new Model_Articles();
        $this->view = new View();
    } 
    function action_index()
    {
        $data['title'] = "Категории";
        $data['categories'] = $this->model->category();
        $this->view->generate_page("articles_view.php",$data);
    }
     
    function action_category()
    {
        $routes = explode("/",$_SERVER['REQUEST_URI']);
        if(isset($routes[3]))
        {
            $id = $routes[3];
        }
        else
        {
            $id = 1;
        }
        $data['title'] = "Категория - ";
        $data['category'] = $this->model->bycategory($id);
        $this->view->generate_page("articles_view.php",$data);
    }
    
    function action_article()
    {
        $routes = explode("/",$_SERVER['REQUEST_URI']);
        if(isset($routes[3]))
        {
            $id = $routes[3];
            $data['article'] = $this->model->article($id);
        }
        else
        {
            $data['article']['no_article'] = "Такой статьи нет";
        }
        $data['title'] = "Категория - ";
        $this->view->generate_page("articles_view.php",$data);
    }
}
?>