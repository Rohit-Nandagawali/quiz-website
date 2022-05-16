<?php

    include('./php/functions.php');
    // session_start();
    // print_r($_SESSION);


?>
    <div class="container-fluid">
        <h1 class="text-center ">Welcome, To Quiz website</h1>
        <div class="row m-3 d-flex align-items-center justify-content-center">
            <!-- login section start -->
            <div class="col-lg-5 shadow p-3 mx-2 rounded border ">
                <!-- login form -->
                <form method="POST" action="./php/action.php?login">
                <h4 class="text-center">Login form</h4>
                <div class="form-floating m-3">
                    <input type="text" name="email_username" value="<?=showFormData('email_username')?>" class="form-control" id="floatingInput" placeholder="Email address/Name" required>
                    <label for="floatingInput">Email address/Name</label>
                </div>
                 <!-- showing error -->
                 <?=showError('email_username')?>

                <div class="form-floating m-3">
                    <input type="password" name="password_login" value="<?=showFormData('password_login')?>" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <!-- showing error -->
                <?=showError('password_login')?>
                <?=showError('checkuser')?>
                 
                <div class="d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>

        <!-- login section end -->
        <!-- sign up section start -->
            <div class="col-lg-5 shadow p-3 mx-2 rounded border ">
                <!-- sign up form -->
                <form method="POST" action="./php/action.php?signup">
                <h4 class="text-center">Sign up form</h4>
                <div class="form-floating m-3">
                    <input type="text" class="form-control" value="<?=showFormData('name')?>" name="name" id="floatingInput" placeholder="Your Name" required>
                    <label for="floatingInput">Your Name</label>
                </div>
                <!-- showing error -->
                <?=showError('name')?>

                <div class="form-floating m-3">
                    <input type="email" class="form-control" value="<?=showFormData('email')?>" name="email" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                     <!-- showing error -->
                <?=showError('email')?>
                
                </div>
                <div class="form-floating m-3">
                    <input type="password" class="form-control" value="<?=showFormData('password')?>" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                 <!-- showing error -->
                 <?=showError('password')?>
                
                <div class="d-flex align-items-center justify-content-center">

                    <button class="btn btn-primary" type="submit">Sign In</button>
                </div>
            </form>
        </div>
        <!-- sign up section end -->
        </div>
    </div>
