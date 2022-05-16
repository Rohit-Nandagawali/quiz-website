
<?php


require_once '../php/db.php';
if(!$_SESSION['username']){
    header("location:../");
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't  connect to database!"); 
    if(($_POST['quizcheck'])){
        $count = count($_POST['quizcheck']);
        include("header.php");
        ?>
        <!-- echo "Out of 5, you have answered ".$count." questions";  -->

       
        <?php
        include("footer.php");
        $selected=$_POST['quizcheck'];
        $score=0;
        $i=1;

        $q = "SELECT * FROM questions";
        $query = mysqli_query($connection,$q);
        while($rows = mysqli_fetch_array($query)){
            $checked=$rows['ans_id']==$selected[$i];
            if ($checked) {
                $score++;
            }
            $i++;
        }
        ?>
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center p-5">
                <div class="col-lg-6">
                    <div class="header p-3 bg-dark">
                        <h3 class=" text-white text-center">Result</h3>
                    </div>
                    <table class="table border">
                        <tbody>
                            <tr>
                                <th scope="row">Question Attempted</th>
                                <td>Out of 5, you have answered <?=$count?> questions</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Your Total Score</th>
                                <td>Your score is <?=$score?></td>                             
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a class="btn btn-primary m-2 " href="">print certificate</a>
                                </td>                             
                            </tr>
                        </tbody>
                    </table>
                    
                    <a class="btn btn-danger m-2 " href="../php/logout.php">logout</a>
                </div>
            </div>
        </div>

        <?php
        $username = $_SESSION["username"];
        // echo $username;

        $insert_result ="UPDATE users SET totalques='5',answercorrect='$score' WHERE email='$username'";
        mysqli_query($connection,$insert_result);
    }
    else{
        header("location:../");
    }



?>
