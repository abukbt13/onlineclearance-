<?php
include '../connection.php';
if(isset($_POST["save_student"])) {
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $course= $_POST['course'];
    if(preg_match('/^[A-Za-z]+$/',$name)){
        if(preg_match('/^[A-Z]{2}[0-9]{3}\/[0-9]{6}\/[0-9]{2}$/',$regno)){


            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $save = "insert into students(name,regno,email,school,course) values('$name','$regno','$email','$school','$course')";
                $res = mysqli_query($conn, $save);
                if ($res) {
                    session_start();
                    $_SESSION['status'] ='Student saved Successfully';
                    header('Location:index.php');
                }
            }
            else{
                session_start();
                $_SESSION['status'] ='Invalid details';
                header('Location:students.php');
            }

        }
        else{
            session_start();
            $_SESSION['status'] ='Invalid details';
            header('Location:students.php');
        }



    }
    else{
        session_start();
        $_SESSION['status'] ='Invalid details';
        header('Location:students.php');
    }



}