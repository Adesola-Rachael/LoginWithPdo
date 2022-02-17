<?php
class Pages extends Controller{
    public function __construct(){
        // echo 'Loaded';
        $this->userModel = $this->model('User');
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
    
    public function register(){
        
        $data=[
            'title'=>'Login Page',
            'usernameError'=>'',
            'EmailError'=>'',
            'passwordError'=>'',
            'confirmPasswordError'=>'',
            'username'=>'',
            'email'=>'',
            'password'=>'',
            'AllError'=>'',
            'confirmPassword'=>'',
         ];
        if($_SERVER['REQUEST_METHOD']=='POST') {
            // sanitize post data
            $_POST =filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            $data=[
                'title'=>'Login Page',
                'usernameError'=>'',
                'EmailError'=>'',
                'passwordError'=>'',
                'confirmPasswordError'=>'',
                'AllError'=>'',
                'username'=>trim($_POST['username']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirmPassword'=>trim($_POST['confirmPassword']),
            ];
            // username Validation
                $namevalidation ="/^[a-zA-Z0-9]*$/";
                $passwordValidation= "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
                if(empty($data['username'])) {
                    $data['usernameError']='Please Enter Your Username';
                }elseif(!preg_match($namevalidation, $data['username'])){
                    $data['usernameError']='Name can only contain letters and numbers';

                }

                // Email Validation
                if(empty($data['email'])) {
                    $data['emailError']='Please Enter Your Email';
                }elseif(!filter_var($data['username'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError']='Please Enter the correct format';

                }else{
                    // check if email exist
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken';
                    }
                }
                // Validate password
                if(empty($data['password'])){
                    $data['passwordError']='Password Field Must Not Be Empty';
                }
                elseif(strlen($data['password'] < 8)) {
                    $data['passwordError']='Password  Must Be At Least Eight Characters';
                    
                }
                elseif(!preg_match($passwordValidation, $data['password'])){
                    $data['passwordError']='Password Must Have At Least One Numeric Value';

                }
                // validate confirm password
                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError']='Password Field Must Not Be Empty';
                }elseif($data['password'] != $data['confirmPassword'] ){
                    $data['confirmPasswordError'] = 'Passwords Do No Match! Please Try Again';
 
                }
                // check if all errors are empty
                if(empty($data['usernameError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                    $data['AllError']='No Error At All';
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                    // registr user from model function
                    if($this->userModel->register($data)) {
                        // redirect to the login page
                        header('location:'.URLROOT.'/users/login');
                    }else{
                        die('something went wrong');
                    }
                }
                // else{
                //     die('something went wrong');
                // }

                
        
            
            
        }
        $this->view('users/register',$data);
 
    }
    public function Login(){
        $data=[
            'title'=>'Login Page',
            'usernameError'=>'',
            'passwordError'=>'',
            'username'=>'',
            'password'=>''
         ];

        if($_SERVER['REQUEST_METHOD']=='POST') {
            // sanitize post data
            $_POST =filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            $data=[
                'title'=>'Login Page',
                'usernameError'=>'',
                 'passwordError'=>'',
                 'username'=>trim($_POST['username']),
                 'password'=>trim($_POST['password']),
            ];

            if(empty($data['username'])) {
                $data['usernameError']='Please Enter Your Username';
            }
            if(empty($data['password'])) {
                $data['passwordError']='Please Enter Your Password';
            }
            if(empty($data['usernameError'])&& empty($data['passwordError'])){
                $loggedInUser =$this->userModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['passwordError'] = 'password or username is incorrect. Please try again';

                    $this->view('users/login',$data);
                }
            }
        }else{
            $data=[
                 'usernameError'=>'',
                'passwordError'=>'',
                'username'=>'',
                'password'=>''
             ];
        }
        $this->view('users/login',$data);
    
    }
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('location:' . URLROOT . '/pages/index');
    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
         header('location:' . URLROOT . '/users/login');
    }

}