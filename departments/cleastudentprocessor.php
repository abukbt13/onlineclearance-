<?php
include '../connection.php';
if(isset($_POST['clearstudent'])){
    $regno= $_POST['regno'];
    $department= $_POST['department'];
//    echo $department;
//    die();
    $sql = "update students set $department='1' where regno='$regno'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $sql1 = "update clearance set status='1' where regno='$regno' and department='$department'";
        $result1 = mysqli_query($conn,$sql1);
        if($result1) {
            session_start();
            $_SESSION['status'] = 'The student has been cleared successfully';
            header("Location:$department.php");
        }
    }
}
if(isset($_POST['clearstudentboarding'])){
    $regno= $_POST['regno'];
    $department= $_POST['department'];
//    echo $department;
//    die();
    $sql = "update students set boardings='1' where regno='$regno'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $sql1 = "update clearance set status='1' where regno='$regno' and department='boardings'";
        $result1 = mysqli_query($conn,$sql1);
        if($result1) {
            session_start();
            $_SESSION['status'] = 'The student has been cleared successfully';
            header("Location:$department.php");
        }
    }
}