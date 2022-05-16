<?php

    // require_once 'functions.php';
    include("db.php");
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't  connect to database!"); 


    // code for signin
    if(isset($_GET['signup'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_query($connection,$query);
        $num = mysqli_num_rows($result);

        if($num ==1){
            echo "duplicate data ";
        }
        else{
            $insert_query = "INSERT INTO users (username,email,password)";
            $insert_query.="VALUES ('$name','$email','$password')";
            mysqli_query($connection,$insert_query);

            $_SESSION['username']=$email_username;
            header("location:../pages/quiz.php");
        }


    }



    // -------------------------------
    // code for login
    if(isset($_GET['login'])){

        $email_username = $_POST['email_username'];
        $password = $_POST['password_login'];

        $query = "SELECT * FROM users WHERE email='$email_username' or username='$email_username' and password='$password'";
        $result = mysqli_query($connection,$query);
        $num = mysqli_num_rows($result);

        if($num ==1){
           $_SESSION['username']=$email_username;
           header("location:../pages/quiz.php");
        }
        else{
          
        }

    }



?>