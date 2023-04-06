<?php
include '../connection.php';
if(isset($_POST['clearstudent'])){
    $regno= $_POST['regno'];
    $sql = "update students set academics=1 where regno='$regno'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $sql1 = "update clearance set status=1 where regno='$regno'";
        $result1 = mysqli_query($conn,$sql1);
        if($result1) {
            session_start();
            $_SESSION['status'] = 'The student has been cleared successfully';
            header("Location:academics.php");
        }
    }
}