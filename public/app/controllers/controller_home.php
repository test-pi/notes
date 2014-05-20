<?php
class Controller_Home extends Controller
{

    function __construct()
    {
        $this->model = new Model_Home();
        $this->view = new View();
    } 
    function action_index()
    {	
        $data["data"] = $this->model->get_data();
        
        $data["title"] = "Главная!";
        
        $this->view->generate_page('home_view.php',$data);
    }
}
?>