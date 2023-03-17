<?php
session_start();
include'../connection.php';
if(isset($_POST['academics_clearance'])) {
    $regno = $_POST['regno'];
    $category = $_POST['category'];
    $description = $_POST['description'];


    $save = "insert into academics(regno,description,category) values('$regno','$description','$category')";
    $saverun = mysqli_query($conn, $save);
    if($saverun){
        session_start();
        $_SESSION['status'] = 'The student details added successfully';
        header("Location:index.php");
    }
}
if(isset($_POST['boarding_clearance'])) {
    $regno = $_POST['regno'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];


    $savedeta = "insert into boardings(regno,description,category,cost) values('$regno','$description','$category','$cost')";
    $savedetarun = mysqli_query($conn, $savedeta);
    if($savedetarun){
        session_start();
        $_SESSION['status'] = 'The student details added successfully';
        header("Location:index.php");
    }
}
if(isset($_POST['library_clearance'])) {
    $regno = $_POST['regno'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];


    $savedeta = "insert into library(regno,description,category,cost) values('$regno','$description','$category','$cost')";
    $savedetarun = mysqli_query($conn, $savedeta);
    if($savedetarun){
        session_start();
        $_SESSION['status'] = 'The student details added successfully';
        header("Location:index.php");
    }
}
if(isset($_POST['sports_clearance'])) {
    $regno = $_POST['regno'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $sportscategory= $_POST['sportscategory'];
    $save = "insert into sports(regno,description,cost,sportscategory) values('$regno','$description','$cost','$sportscategory')";
    $saverun = mysqli_query($conn, $save);
    if($saverun){
        session_start();
        $_SESSION['status'] = 'The student details added successfully';
        header("Location:index.php");
    }



}
if(isset($_POST['add_admins'])) {
    if(!$_SESSION['admin_id']=='001') {
        session_start();
        $_SESSION['status'] = 'Super Admin responsible for this task';
        header("Location:index.php");
    }
    $name= $_POST['name'];
    $staffno = $_POST['staffno'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $role= $_POST['role'];
    $password= md5($_POST['password']);


    $saveadmin = "insert into admins(name,staffno,email,phone,role,password) values('$name','$staffno','$email','$phone','$role','$password')";
    $saveadminrun = mysqli_query($conn, $saveadmin);
    if($saveadminrun){
        session_start();
        $_SESSION['status'] = 'Admin was added successfully';
        header("Location:index.php");
    }
}
if(isset($_POST['feebalance_clearance'])) {
    $admin_id=$_SESSION['admin_id'];
//    if(!$_SESSION['admin_id']=='001') {
//        session_start();
//        $_SESSION['status'] = 'Super Admin responsible for this task';
//        header("Location:index.php");
//    }
    $feebalance= $_POST['feebalance'];
    $regno= $_POST['regno'];
    $feebalance= $_POST['feebalance'];



    $saveadmi= "insert into finance(regno,feebalance,admin_id) values('$regno','$feebalance','$admin_id')";
    $saveadmirun = mysqli_query($conn, $saveadmi);
    if($saveadmirun){
        session_start();
        $_SESSION['status'] = 'Fees details Updated successfully';
        header("Location:index.php");
    }
}


?>