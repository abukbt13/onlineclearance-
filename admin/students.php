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
            $role=$_SESSION['role'];
            if($role==1){
                echo '<li><a href="logout.php">Logout</a></li>';

            }
            else{
                echo '<li><a href="logout.php">Logout</a></li>';

            }

        }
        else{
            echo '<li><a href="../logout.php">Logout</a></li>';

        }
        ?>
    </ul>
    <span class="show" id="show">Show</span>


</div><?php
if(isset($_SESSION['status'])){
    ?>

            <p class="bg-danger p-2 text-uppercase text-center"><?php echo $_SESSION['status'] ?></p>

    <?php
    unset($_SESSION['status']);
}
?>

<div class="container d-flex bg-body-tertiary">
    <div class="sidebar  bg-info px-4">
        <h2 class="text-center text-white bg-secondary">Dashboard</h2>
        <span>Departments</span>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="index.php">Home</a></li>
        <li class="list-unstyled mb-3"><a class="text-decoration-none bg-info p-2" href="addadmins.php">Add Admin</a></li>
        <span>Students</span><br>
        <li class="list-unstyled mb-3 "><a class="text-decoration-none bg-info p-2 active" href="students.php">Students</a></li>

        <li class="list-unstyled mb-3 ">
            <span>Reports</span><br>
            <form action="reports.php" method="post">
                <button style="border:none; margin-bottom: 1rem;margin-top: 1rem;" name="cleared" class="bg-primary">Cleared students</button>
            </form>
            <!--            <form action="reports2.php" method="post">-->
            <!--                <button style="border:none; margin-bottom: 1rem;margin-top: 1rem;" name="cleared" class="bg-primary">Uncleared  students</button>-->
            <!--            </form>-->
    </div>
    <div class="content">
        <div class="das d-flex justify-content-center align-items-center">

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
                    <select name="school" id="school" CLASS="form-control">
                        <option value=""> --select school--</option>
                        <option value="SEA">SEA</option>
                        <option value="SCI">SCI</option>
                        <option value="SED">SED</option>
                        <option value="SPAS">SPAS</option>
                        <option value="AGED">AGED</option>
                        <option value="SBE">SBE</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Course</label>
                    <select name="course" id="school" CLASS="form-control">
                        <option value=""> --select course--</option>
                        <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                        <option value="Bachelor Of Education in Arts">Bachelor Of Education in Arts</option>
                        <option value="Nursing">Nursing</option>
                        <option value="Bachelor Of Education in Science">Bachelor Of Education in science</option>
                        <option value="Bachelor of Technology in Electrical And Electronic">Bachelor of Technology in Electrical And Electronic</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Bachelor of Technology in Mechanical Engineering">Bachelor of Technology in Mechanical Engineering</option>
                        <option value="Computer Technology">Computer Technology</option>
                        <option value="Mathematics And Computer Science">Mathematics And Computer Science</option>
                    </select>
                </div>
                <div class="d-flex align-items-center flex-row  justify-content-center">
                    <button type="submit" name="save_student" class="btn w-50 btn-primary text-uppercase">Save students details</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        var school = document.getElementById("school");
        var course = document.getElementById("course");

        school.addEventListener("change", function() {
            var type= school.value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set up the Ajax request
            xhr.open("POST", "coursedropdown.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Send the Ajax request with the selected region value
            xhr.send("name=" + type);

            // Handle the Ajax response
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    var names = JSON.parse(xhr.responseText);

                    // Clear the districts select element and add the new options
                    course.innerHTML = "";

                    // Add a null/empty option as the first option
                    var emptyOption = document.createElement("option");
                    emptyOption.value = "";
                    emptyOption.text = "--Select product name--";
                    course.appendChild(emptyOption);

                    for (var i = 0; i < names.length; i++) {
                        var option = document.createElement("option");
                        option.value = names[i];
                        option.text = names[i];
                        course.appendChild(option);
                    }
                }
            }
        });




    </script>
</body>
</html>
