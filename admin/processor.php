<?php
include '../connection.php';
if(isset($_POST["save_student"])) {
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $course= $_POST['course'];

    $save = "insert into students(name,regno,email,school,course) values('$name','$regno','$email','$school','$course')";
    $res = mysqli_query($conn, $save);
    if ($res) {
        session_start();
        $_SESSION['status'] ='Student saved Successfully';
        header('Location:index.php');
    }

}