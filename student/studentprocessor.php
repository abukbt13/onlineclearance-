<?php
include '../connection.php';
$staffno1='superadmin@must';
$password1='mustiso@2015';
if (isset($_POST['login'])) {
    $regno = $_POST['regno'];
    $idno = $_POST['idno'];
    $sql = "select name from students where regno='$regno' && idno='$idno'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    if ($count == 1) {

        $find = "select * from students where regno='regno'";
        $retrieve = mysqli_query($conn, $find);
        $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);


        //the password was correct
        foreach ($users as $user) {
            $user_id = $user['id'];
            $regno = $user['regno'];
        }
            session_start();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['regno'] =  $regno;
            $_SESSION['status'] = "You have successfully logged in.";
        header("Location:index.php");
    }

    else {
        session_start();
        $_SESSION['status'] = "The credentials does not match";
        header("Location:../index.php");
    }
}
if (isset($_POST['stafflogin'])) {
    $staffno= $_POST['staffno'];
    $password = $_POST['password'];
    $encryptedpassword=md5($_POST['password']);
    $sql1 = "select staffno from admins where staffno='$staffno' && password='$encryptedpassword'";
    $query= mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($query);
//    echo $count;

    if ($count == 1) {

        $find = "select * from admins where staffno='$staffno'";
        $retrieve = mysqli_query($conn, $find);
        $users = mysqli_fetch_all($retrieve, MYSQLI_ASSOC);


        //the password was correct
        foreach ($users as $user) {
            $user_id = $user['id'];
        }
            session_start();

        session_start();
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['role'] = "Admin";
        $_SESSION['status'] = "Welcome back";
        header("Location:../admin/index.php");
    }

    else if($staffno=="superadmin@must" && $password=="mustiso@2015") {
        session_start();
        $_SESSION['role'] = 'superadmin';
        $_SESSION['admin_id'] = '001';
        $_SESSION['status'] = "Welcome back";
        header("Location:../admin/index.php");
    }
    else{
        session_start();
        $_SESSION['status'] = 'The credentials do not match"';
        header("Location:../index.php");
    }
}
if (isset($_POST['retake'])) {
    $regno=$_POST['regno'];
    $category=$_POST['category'];
    $academic_id=$_POST['id'];
    $id=$_POST['id'];
    $save = "insert into requests(regno,category,status,academic_id) values('$regno','$category','0','$academic_id')";
    $res = mysqli_query($conn, $save);

    if($res){
        $update= "update academics set status=2 where regno='$regno' and id='$id'";
        $updaterun = mysqli_query($conn, $update);
        if($updaterun){
            $_SESSION['status'] = 'request is being processing wait for feedback from the admin';
            header("Location:academics.php");
        }

    }


}

if (isset($_POST['clearnow'])) {
    $regno=$_POST['regno'];
    $department=$_POST['department'];
    $clear="update students set $department='1' where regno='$regno'";
    $clearrun=mysqli_query($conn,$clear);
    if($clearrun){
        session_start();
        $_SESSION['status'] = 'You have cleared with '.$deparment.' successfully';
        header("Location:index.php");
    }


}