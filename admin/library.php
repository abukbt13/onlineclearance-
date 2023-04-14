<?php
session_start();
$role=$_SESSION['role'];
include '../connection.php';

if($role!='library') {
    session_start();
    $_SESSION['status'] = 'Login first to be able to view this page';
    header('Location:../index.php');
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
<style>
    .head{
        padding-left: 1rem;
        background: antiquewhite;
        display: flex;
        justify-content: space-between;
        height: 3rem;
    }
    .ul{
        display: flex;
    }

    .ul li{
        list-style: none;
        margin-right: 1rem;
        font-size: 22px;
    }
    .ul li a{
        padding: 0.5rem;
        text-decoration: none;
    }
    .ul li a:hover{
        background: blue;
        color: white;
    }
    .show{
        display: none;
        position: absolute;
        top: 0.2rem;
        right: 0.2rem;
        color: #0a58ca;
    }
    @media screen and (max-width: 500px) and (min-width: 200px) {
        .show{
            display: block;
        }
        .head{
            display: flex;
            flex-direction: column;
            padding-left: 0rem;
            position: relative;
        }
        .ul{
            position: relative;
            display: flex;
            top: -6rem;
            background: grey;
            align-items: center;
            justify-content: center;
            width: 100vw;
            /*transition-property: top;*/
            transition-duration: 0.5s;
            transition-timing-function: ease-in;
        }
        .ul li {
            list-style: none;
            margin-right: 0rem;
        }
        .ul li a:hover{
            background: blue;
            color: white;
        }
        .active{
            top: 0rem;
        }

    }</style>
<div class="head bg-info">
    <h3><a href="index.php">Meru University Of Science And Technology</a></h3>
    <ul class="ul" id="links" class="links">

        <?php

        if (isset($_SESSION['role'])) {

            echo '<li><a href="../logout.php">Logout</a></li>';
        }

        ?>
    </ul>
    <span class="show" id="show">Show</span>


</div>
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
<div class="d-flex bg-body-tertiary">
    <div class="sidebar  bg-info px-4">
        <h2 class="text-center text-white bg-secondary">Academics</h2>
        <span>Academics</span>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="../departments/library.php">Home</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="../admin/library.php">Add students to clear</a></li>

        <li class="list-unstyled mb-3 ">
            <span>Reports</span><br>
            <form action="reports.php" method="post">
                <button style="border:none; margin-bottom: 1rem;margin-top: 1rem;" name="cleared" class="bg-primary">Clear students</button>
            </form>
            <form action="reports.php" method="post">
                <button style="border:none; margin-bottom: 1rem;margin-top: 1rem;" name="cleared" class="bg-primary">Generate report</button>
            </form>
        </li>
        <li class="list-unstyled mb-3 ">
            <span>Clearance Requests</span><br><br>
            <a href="../admin/requests.php" class="text-decoration-none mt-3">Requests</a>
        </li>
    </div>
    <div class="content">
        <form class="form" method="post" action="adminprocessor.php">

            <h4>Library Clearance form</h4>
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
                </select>            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <select name="category" required id="" class="form-control">
                    <option value="">--Select Category--</option>
                    <option value="Lost Book">Lost Book</option>
                    <option value="Unreturned book">Unreturned book</option>
                    <option value="Carelessness">Careless </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Short Description</label>
                <textarea class="form-control" required rows="5" name="description" ></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Costing Amount</label>
                <input type="number" required class="form-control" name="cost" id="exampleInputEmail1" placeholder="Cost Amount">
            </div>
            <div class="d-flex mt-4 align-items-center flex-row  justify-content-center">
                <button type="submit" name="library_clearance" class="btn w-100 btn-primary text-uppercase">Update Academic Clearance</button>

            </div>
        </form>

    </div>
</div>


</body>
</html>
