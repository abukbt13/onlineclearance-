<?php
session_start();
include '../connection.php';
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
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="academics.php">Academics</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="boarding.php">Boarding</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="finance.php">Finance</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="sports.php">Sports</a><br>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="library.php">Library</a><br>
            <span>Students</span><br>
        <li class="list-unstyled mb-3 "><a class="text-decoration-none bg-info p-2 active" href="students.php">Students</a></li>
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
            <form class="form" method="post" action="adminprocessor.php">

                <h4>Boarding Clearance form</h4>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Enter  Registration No</label>
                    <select class="form-control" name="regno" id="">
                        <?php
                        $query  = "SELECT regno FROM students";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['regno'];?>">
                                <?php echo $row['regno'];?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Category</label>
                    <select name="category" required id="" class="form-control">
                        <option value="">--Select Category--</option>
                        <option value="Boarding fees">Boarding fees</option>
                        <option value="Damages">Damages in the hostel</option>
                        <option value="Lost Items">Lost Items in the hostel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Short Description</label>
                    <textarea class="form-control" required rows="5" name="description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Costing Amount</label>
                    <input type="text" required class="form-control" name="cost" id="exampleInputEmail1" placeholder="Cost Amount">
                </div>
                <div class="d-flex mt-4 align-items-center flex-row  justify-content-center">
                    <button type="submit" name="boarding_clearance" class="btn w-100 btn-primary text-uppercase">Update Academic Clearance</button>

                </div>
            </form>
        </div>


</body>
</html>
