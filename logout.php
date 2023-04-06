

<?php
session_start();
include('connection.php');
if(!isset($_SESSION['role'])) {
    header('Location:index.php');
}

//$uid=$_SESSION['uid'];

if(isset($_SESSION['role'])){

    session_destroy();
    session_start();
    $_SESSION['status']='You have logged out successfully';
    header('location:index.php');
}
else{
    header('location:index.php');
}


?>
