<?php
class Pages extends Controller{
    public function __construct(){
        // echo 'Loaded';
        // $this->userModel = $this->model('User');
    }
    public function index(){
        // echo "Homeopopage";
        // $users = $this->userModel->getUsers();
        $data= [
            'title' =>'Home page',
           
             
        ];
        $this->view('pages/index',$data);
    }
    public function About(){
      
        $this->view('about');

    }
    // public function Login(){
      
    //     $this->view('users/login');

    // }
}