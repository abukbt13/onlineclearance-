<?php
session_start();
if(!isset($_SESSION['regno'])) {
    session_start();
    $_SESSION['status'] = 'Login first to be able to view this page';
    header('Location:../index.php');
}
$regno=$_SESSION['regno'];

if(isset($_SESSION['status'])){
    ?>
    <div>
        <div class="bg-danger">
            <p class="bg-danger p-2 text-uppercase"><?php echo $_SESSION['status'] ?></p>
        </div>
    </div>
    <?php
    unset($_SESSION['status']);
}

include '../header.php';
?>
<link rel="stylesheet" href="../css/style.css">
<script src="../app.js"></script>
<div class="contents d-flex flex-row">
    <div class="sidebar w-25">
        <h2>My dashboard</h2>
        <div class="clear">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="academics.php">Academics</a></li>
                <li><a href="sports.php">Sports</a></li>
                <li><a href="boarding.php">Boarding</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="finance.php">Finance</a></li>
            </ul>
        </div>
    </div>
    <div class="main_content w-75 border-start h">
<h2>Contents Here</h2>
    </div>
</div>