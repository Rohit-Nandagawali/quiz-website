<?php

session_start();
if(!$_SESSION['username']){
    header("location:../");
}
    
include("header.php");

include("questions.php");
include("footer.php");

?>