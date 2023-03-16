<?php
session_start();

?>

<body>
<style>
    .content{
        width: 100vw;
        height: 90vh;
        background-color:red;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .main_content{
        height: 32rem;
    }
    .student{
        display: none;
    }
   .admin{
       display: none;
   }


</style>
<?php include'header.php'; ?>

<div class="content">

    <div class="main_content d-flex justify-content-center align-items-center w-50 bg-secondary">


        <div class="content_center d-flex justify-content-center">
        <div class="choice">
      <?php   if(isset($_SESSION['status'])){
                ?>
                <div>
                    <div class="bg-danger">
                        <p class="bg-danger p-4 m-4  text-uppercase"><?php echo $_SESSION['status'] ?></p>
                    </div>
                </div>
                <?php
                unset($_SESSION['status']);
            }
            ?>

            <p class="text-center text-light text-uppercase pt-2">Login As</p>
            <div class="student_login d-flex align-items-center justify-content-center">
                <button class="btn btn-primary me-4" id="show_student">Student</button>
                <button class="btn btn-primary ms-4" id="show_admin">Admin</button>
            </div>
            <div class="student" id="student">
                <form class="" action="student/studentprocessor.php" method="post">
                    <!--        <p>Meru University Of science And Technology</p>-->
                    <p class="text-center">Login as Student</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter Registration No</label>
                        <input type="text" class="form-control" name="regno" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="idno" placeholder="Use your id number as password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    <p class="text-white text-uppercase mt-4">Dont remember Password?<a href="resetpassword.php">Click here</a></p>

                </form>

            </div>
            <div class="admin" id="admin">
                <form class="" action="student/studentprocessor.php" method="post">
                    <!--        <p>Meru University Of science And Technology</p>-->
                    <p class="text-center">Admin Login </p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Staff  Number</label>
                        <input type="text" class="form-control" name="staffno" id="exampleInputEmail1" placeholder="Enter your staff no" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your Password">
                    </div>
                    <button type="submit" name="stafflogin" class="btn btn-primary w-100">Login</button>
                    <p class="text-white text-uppercase mt-4">Dont remember Password?<a href="resetpassword.php">Click here</a></p>

                </form>

            </div>
        </div>
        </div>
    </div>
</div>
<script>
    const show_student=document.getElementById("show_student");
    const student=document.getElementById("student");
    show_student.addEventListener('click', ()=>{
        // alert('hey')
        student.style.display="block";
        admin.style.display="none"

    })
    const show_admin=document.getElementById("show_admin");
    const admin=document.getElementById("admin");

    show_admin.addEventListener('click', ()=>{
        admin.style.display="block"
        student.style.display="none";
    })
</script>
</body>

</html>
