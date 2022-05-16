<?php


    require_once 'db.php';
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't  connect to database!"); 

    // validate user signup 
   if (isset($_GET[''])) {
       # code...
   }


    // for validate the login form
    function validateLogin($form_data){
        $responce = array();
        $responce['status']=true;
        $blank=false;
        if (!$form_data['password_login']) {
            $responce['msg']= "password is not given";
            $responce['status']= false;
            $responce['field']= "password_login";
            $blank=true;
          
            
        }
        if (!$form_data['email_username']) {
            $responce['msg']= "Email or Name is not given";
            $responce['status']= false;
            $responce['field']= "email_username";
            $blank=true;

            
        }
        if (!$blank && !checkUser($form_data)['status']) {
            $responce['msg']= "Something is incorrect, we can't find you :(";
            $responce['status']= false;
            $responce['field']= "checkuser";
        }
        else {
            $responce['user']=checkUser($form_data)['user'];
        }
       
       return $responce;
    }

    // for checking the user (for login)
    function checkUser($login_data){
        global $connection;
        $email_username = mysqli_escape_string($connection,$login_data['email_username']);
        $password = mysqli_escape_string($connection,$login_data['password_login']);

        $query = "SELECT * FROM users WHERE (email = '$email_username' OR username = '$email_username') AND password='$password'";

        $run = mysqli_query($connection,$query);
        $data['user'] = mysqli_fetch_assoc($run) ?? array(); //?? this operator gives blank array if nothing is present

        if(count($data['user'])>0){
            $data['status']=true;
        }
        else{
            $data['status']=false;
        }

        return $data;

    }

    // function for show error
    function showError($field){
        if (isset($_SESSION['error'])) {
            $error=$_SESSION['error'];
            if(isset($error['field']) && $field == $error['field']){
                
                ?>
                <div class="alert alert-danger my-1" role="alert">
                    <?=$error['msg']?>
                </div>
                
                <?php

            }
        }
    }

    // function for show previous data
    function showFormData($field){
        if (isset($_SESSION['formdata'])) {
            $formdata=$_SESSION['formdata'];
            return $formdata[$field];
        }
    }

    // for checking duplicate email
    function isEmailRegisterd($email){
        global $connection;
        // this gives number of row that matches this condition
        $query = "SELECT count(*) as row FROM users WHERE email = '$email'";
        $run = mysqli_query($connection,$query);
        $return_data = mysqli_fetch_assoc($run);
        return $return_data['row'];
    }
    // for checking duplicate name
    function isNameRegisterd($name){
        global $connection;
        // this gives number of row that matches this condition
        $query = "SELECT count(*) as row FROM users WHERE username = '$name'";
        $run = mysqli_query($connection,$query);
        $return_data = mysqli_fetch_assoc($run);
        return $return_data['row'];
    }

    // creating new user
    function createUser($data){
        global $connection;
        $username = mysqli_escape_string($connection,$data['name']);
        $email = mysqli_escape_string($connection,$data['email']);
        $password = mysqli_escape_string($connection,$data['password']);
        $query = "INSERT INTO users(username,email,password) ";
        $query.="VALUES ('$username','$email','$password')";
        return mysqli_query($connection,$query);
    
    }

?>