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
            <table class="table table-primary table-bordered">
                <tr>
                    <th>Admission</th>
                    <th>Category</th>
                    <th>Operation</th>
                </tr>
                <?php
                include '../connection.php';
                $academic="select * from requests where status=0";
                $academicrun=mysqli_query($conn,$academic);
                while($posts=mysqli_fetch_assoc($academicrun)) {
                    ?>

                    <tr>
                        <td><?php echo $posts['regno'] ?></td>
                        <td><?php echo $posts['category'] ?></td>
                        <td>
                            <form action="response.php" method="post">
                                <input type="text" name="regno" hidden="" value="<?php echo $posts['regno'] ?>">
                                <input type="text" name="request_id"  value="<?php echo $posts['id'] ?>">
                                <input type="text" name="academic_id" hidden="" value="<?php echo $posts['academic_id'] ?>">
                                <input type="text" name="category" hidden="" value="<?php echo $posts['category'] ?>">
                                <button name="response" type="submit" id="respond" class="btn btn-success">Respond</button>

                            </form>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>


        </div>


</body>
</html>
