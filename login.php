<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js"></script>
</head>
<body>
<?php
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
?>
<div class="das d-flex justify-content-center align-items-center">
    <form class="form w-50 " action="student/studentprocessor.php" method="post">
<!--        <p>Meru University Of science And Technology</p>-->
        <p>Login to Your Account to starrt clearance </p>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Registration No</label>
        <input type="text" class="form-control" name="regno" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="idno" placeholder="Use your id number as password">
    </div>
        <a href="resetpassword.php">Dont remember Password</a><br>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
</div>
<style>
    .das{
        width:100vw;
        height:100vh;
    }
</style>
</body>
</html>