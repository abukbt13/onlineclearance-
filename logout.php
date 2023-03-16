

<?php
session_start();
include('connection.php');
if(!isset($_SESSION['username'])) {
    header('Location:index.php');
}

//$uid=$_SESSION['uid'];

if(isset($_SESSION['regno'])){

    session_destroy();
    header('location:index.php');
}
else{
    header('location:index.php');
}


?>
