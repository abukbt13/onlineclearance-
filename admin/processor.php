<?php
include '../connection.php';
if(isset($_POST["save_student"])) {
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $idno = $_POST['idno'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $course= $_POST['course'];

    $save = "insert into students(name,regno,idno,email,school,course) values('$name','$regno','$idno','$email','$school','$course')";
    $res = mysqli_query($conn, $save);
    if ($res) {
        $_SESSION['status'] ='Student saved Successfully';
        header('Location:students.php');
    }

}