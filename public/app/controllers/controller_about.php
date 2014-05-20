<?php
class Controller_About extends Controller
{
    function __construct()
    {
        $this->model = new Model_About();
        $this->view = new View();
    } 
    function action_index()
    {
        $data['title'] = "Про меня";
        $data['about'] = $this->model->category();
        $this->view->generate_page("about_view.php",$data);
    }
     
    
}
?>