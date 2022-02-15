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
            // 'users'=>$users
             
        ];
        $this->view('pages/index',$data);
    }
    // public function About(){
    //     // echo "Aboutpage";
    //     $data= [
    //         'title' =>'Home page',
    //         // 'users'=>$users
             
    //     ];
    //     $this->view('users/login',$data);

    // }
}