<?php
session_start();
include '../connection.php';
if(isset($_POST['response'])) {
    $regno=$_POST['regno'];
    $category=$_POST['category'];
    $request_id=$_POST['request_id'];
    $academic_id=$_POST['academic_id'];
}
if(isset($_POST['respondback'])){
    $regno=$_POST['regno'];
    $request_id=$_POST['request_id'];
    $academic_id=$_POST['academic_id'];
    $description=$_POST['description'];
    $save = "update academics set response ='$description' where regno='$regno' && id='$academic_id' ";
    $res = mysqli_query($conn, $save);
    if($res){
        $updatere = "update requests set status ='1' where  id='$request_id' ";
        $updatererun= mysqli_query($conn, $updatere);
        if($updatererun){
            $_SESSION['status'] = 'request responded';
            header("Location:index.php");
        }

    }
}
?>
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
<div class="bg-info">
    <?php include'../header.php'; ?>
</div>
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
    .sidebar{width: 20vw;}
    .content{ width:80vw;height:100vh; background:grey;padding-left: 4rem;padding-right: 4rem;padding-top:0.5rem;}
    /*.content{*/
    /*    width: 80vw;*/
    /*}*/
</style>
<div class="d-flex bg-body-tertiary">
    <div class="sidebar  bg-info px-4">
        <h2 class="text-center text-white bg-secondary">Dashboard</h2>
        <span>Departments</span>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="addadmins.php">Add Admin</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="academics.php">Academics</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="boarding.php">Boarding</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="finance.php">Finance</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="sports.php">Sports</a><br>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="library.php">Library</a><br>
            <span>Students</span><br>
        <li class="list-unstyled mb-3 "><a class="text-decoration-none bg-info p-2 active" href="students.php">Students</a></li>
        <span>Requests</span><br>
        <li class="list-unstyled mb-3 "><a class="text-decoration-none bg-info p-2 active" href="requests.php">View</a></li>
    </div>
    <div class="content">
        <div>
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


            <div style="display: block; border: solid;align-items: center; justify-content: center; display: grid;" id="process" class="respond">
                <form action="response.php" method="post">
                    <input type="text" hidden="" name="regno" value="<?php echo $regno;?>">
                    <input type="text" hidden="" name="request_id" value="<?php echo $request_id;?>">
                    <input type="text" hidden="" name="academic_id" value="<?php echo $academic_id;?>">
                    <h4>Re:Request for <?php echo $category;?></h2>
                    <textarea name="description" id="" cols="40" rows="5" class="form-control"></textarea>
                    <button name="respondback" class="btn btn-info w-100 m-2">Respond back</button>
                </form>
            </div>        </div>


</body>
</html>
