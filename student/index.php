<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['regno'])) {
    session_start();
    $_SESSION['status'] = 'Login first to be able to view this page';
    header('Location:../index.php');
}
$regno=$_SESSION['regno'];

$academics="select * from academics where regno='$regno' and status='0'";
$academicsrun=mysqli_query($conn,$academics);
$academicsnum=mysqli_num_rows($academicsrun);

$boarding="select * from boardings where regno='$regno' and status='0'";
$boardingrun=mysqli_query($conn,$boarding);
$boardingnum=mysqli_num_rows($boardingrun);

$library="select * from library where regno='$regno' and status='0'";
$libraryrun=mysqli_query($conn,$library);
$libraryrunnum=mysqli_num_rows($libraryrun);

$sports="select * from sports where regno='$regno' and status='0'";
$sportsrun=mysqli_query($conn,$sports);
$sportsrunnum=mysqli_num_rows($sportsrun);





include '../header.php';
?>
<link rel="stylesheet" href="../css/style.css">
<script src="../app.js"></script>
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
    <div class="admin-content d-flex gap-3 justify-content-center mt-4">


        <div class="products bg-info w-25">
            <p class="text-center">Academics</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear</p>
                <p class="text-center"><?php echo $academicsnum; ?></p>

                <?php if($academicsnum>0){
                    echo "<p class='text-center'><a  href='academics.php'>view</a></p>";
                }?>
            </div>
            <?php
            if($academicsnum==0){
            $confirm_a="select regno from students where academics = 1 and regno='$regno' ";
                $confirm_arun=mysqli_query($conn,$confirm_a);
                $confirm_arunnum=mysqli_num_rows($confirm_arun);

                if($confirm_arunnum==1){
                echo "<p class='text-white bg-success m-1  p-2'>You have cleared with academics department</p>";
            }
            else {
                echo '<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value=' . $regno . '>
                <input type="text" hidden=""  name="department" value="academics">
                
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
            }
            }
            ?>
        </div>
        <div class="products bg-info w-25">
            <p class="text-center">Boarding</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear </p>
                <p class="text-center"><?php echo $boardingnum; ?></p>
                <?php if($boardingnum>0){
                    echo "<p class='text-center'><a  href='boarding.php'>view</a></p>";
                }?>
            </div>
            <?php
            if($boardingnum==0){
                $confirm_b="select regno from students where boardings = '1'  and regno='$regno'";
                $confirm_brun=mysqli_query($conn,$confirm_b);
                $confirm_brunnum=mysqli_num_rows($confirm_brun);
                if($confirm_brunnum==1){
                    echo "<p class='text-white bg-success m-1  p-2'>You have cleared with academics department</p>";
                }
                else{
                    echo'<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value='.$regno.'>
                <input type="text" hidden=""  name="department" value="boardings">
                
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
                }

            }
            ?>

        </div>

        <div class="products bg-info w-25">
            <p class="text-center text-uppercase">Sports</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear </p>
                <p class="text-center"><?php echo $sportsrunnum; ?></p>
                <?php if($sportsrunnum>0){
                    echo "<p class='text-center'><a  href='sports.php'>view</a></p>";
                }?>
            </div>
            <?php
            if($sportsrunnum==0){
                $confirm_s="select regno from students where sports = '1' and regno = '$regno' ";
                $confirm_srun=mysqli_query($conn,$confirm_s);
                $confirm_srunnum=mysqli_num_rows($confirm_srun);
                if($confirm_srunnum==1){
                    echo "<p class='text-white bg-success m-1  p-2'>You have cleared with academics department</p>";
                }
            else {
                echo '<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value=' . $regno . '>
                <input type="text" hidden="" name="department" value="sports">
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
            }
            }
            ?>
        </div>

        <div class="products bg-info w-25">
       <p class="text-center">Library</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear</p>
                <p class="text-center"><?php echo $libraryrunnum; ?></p>
                <?php if($libraryrunnum>0){
                    echo "<p class='text-center'><a  href='library.php'>view</a></p>";
                }?>
            </div>
            <?php
            if($libraryrunnum==0){
                $confirm_l="select regno from students where library = '1'  and regno = '$regno'";
                $confirm_lrun=mysqli_query($conn,$confirm_l);
                $confirm_lrunnum=mysqli_num_rows($confirm_lrun);
                if($confirm_lrunnum==1){
                    echo "<p class='text-white bg-success m-1  p-2'>You have cleared with academics department</p>";
                }
            else {
                echo '<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value=' . $regno . '>
                <input type="text" hidden="" name="department" value="library">
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
            }
            }
            ?>
        </div>


    </div>

</div>