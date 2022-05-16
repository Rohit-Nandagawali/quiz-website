

<?php
require_once '../php/db.php';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't  connect to database!"); 
?>


<div class="container ">
    <div class="d-flex justify-content-between m-3">
        <h1 class="text-center"> Welcome, <span class="text-primary"><?=$_SESSION['username']?></span></h1>

            <a class="btn btn-danger m-2 " href="../php/logout.php">logout</a>

    </div>

    <form method="POST" action="result.php">
    <?php

        for ($i=1; $i < 6; $i++) { 
           
        
        $query = "SELECT * FROM questions WHERE qid='$i'";
        $res = mysqli_query($connection,$query);
        while($rows = mysqli_fetch_array($res)){
        ?>
            <div class="card shadow">
                <h4 class="card-header bg-primary  text-white">
                    <?php
                    
                    echo $i." : ". $rows['question']
                    
                    ?>
                </h4>
                <?php
                 $q = "SELECT * FROM answers WHERE ans_id = '$i'";
                 $query = mysqli_query($connection,$q);
                 while($rows = mysqli_fetch_array($query)){
                     
                     ?>


                    <div class="card-body">
                        <input class="form-check-input" type="radio" name="quizcheck[<?=$rows['ans_id']?>]" value="<?=$rows['aid']?>">
                   
                   <?php
                    echo $rows['answer'];
                    ?>
                    </div>
           
        <?php
        }
    }
    }//for loop
    ?>

    <hr>
    <input class="btn btn-success mx-auto m-3" type="submit" value="Submit">
    </form>

</div>
