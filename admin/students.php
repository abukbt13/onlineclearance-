<?php
session_start();
$role=$_SESSION['role'];

if($role!='superadmin') {
    session_start();
    $_SESSION['status'] = 'Login first to be able to view this page';
    header('Location:../index.php');
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/app.js"></script>
</head>
<body>
<style>
    .sidebar{
        height:100vh;
        width:;
    }
    a:active{
        background-color:deeppink;
        border-radius: 18px;
        color:white;
    }
    a:visited{
        background-color:deeppink;
        border-radius: 18px;
        color:white;
    }

</style>
<div class="container d-flex bg-body-tertiary">
    <div class="sidebar bg-info px-4">
        <h2>Clearance system</h2>
        <span>Departments</span>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="academics.php">Academics</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="boarding.php">Boarding</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="finance.php">Finance</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="sports.php">Sports</a><br>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="library.php">Library</a><br>
            <span>Students</span><br>
        <li class="list-unstyled mb-3 "><a class="text-decoration-none bg-info p-2 active" href="students.php">Students</a></li>
    </div>
    <div class="content">
        <div class="das d-flex justify-content-center align-items-center">
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
            <form class="form" method="post" action="processor.php">
                <h1>MUST CLEARANCE SYSTEM</h1>
                <h4>Upload students details</h4>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter  Registration No</label>
                    <input type="text" class="form-control" required minlength="8" name="regno" id="exampleInputEmail1" placeholder="Registration No">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Student Name</label>
                    <input type="text" class="form-control" required name="name" placeholder="Student Name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Student Email</label>
                    <input type="email" class="form-control" required name="email" placeholder="Student Email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">School</label>
                    <select name="school" id="" CLASS="form-control">
                        <option value="SCI">SCI</option>
                        <option value="SPURS">SPURS</option>
                        <option value="ACHED">ACHED</option>
                        <option value="SBE">SBE</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Course</label>
                    <input type="text" class="form-control" name="course" placeholder="course">
                </div>
                <div class="d-flex align-items-center flex-row  justify-content-center">
                    <button type="submit" name="save_student" class="btn w-50 btn-primary text-uppercase">Save students details</button>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
