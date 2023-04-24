<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['role'])) {
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


               <li><a href="../logout.php">Logout</a></li>

    </ul>
    <span class="show" id="show">Show</span>


</div>
<div class="contents d-flex flex-row">
    <div class="sidebar w-25">
        <h2>My dashboard</h2>
        <div class="clear">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="academics.php">Academics</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="boarding.php">Boarding</a></li>
                <li><a href="finance.php">Finance</a></li>
            </ul>
        </div>
    </div>
    <div class="admin-content d-flex gap-3 justify-content-center mt-4">


        <div class="products bg-info w-100">
            <p class="text-center">Academics</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear</p>
                <p class="text-center"><?php echo $academicsnum; ?></p>

                <?php if($academicsnum>0){
                    echo "<p class='text-center'><a  href='academics.php'>view</a></p>";
                }
                else{
                    $confirm_a="select regno from students where academics = '' and regno='$regno' ";
                    $confirm_arun=mysqli_query($conn,$confirm_a);
                    $confirm_arunnum=mysqli_num_rows($confirm_arun);
//                    echo $confirm_arunnum;
                    $clearme="select regno from clearance  where  regno='$regno' and department='academics' ";
                    $clearmerun=mysqli_query($conn,$clearme);
                    $clearmerunnum=mysqli_num_rows($clearmerun);
                    if($clearmerunnum=='0'){
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
                    else{
                        $confirmifcleared="select regno from students  where  regno='$regno' and academics='1'";
                        $confirmifclearedrun=mysqli_query($conn,$confirmifcleared);
                        $mystatus=mysqli_num_rows($confirmifclearedrun);
//                        echo $mystatus;
                       if($mystatus=='1'){
                           echo "you have cleared with academics";
                       }else{
                           echo "Pending";
                       }

                    }



                }
                ?>
            </div>

        </div>


        <div class="products bg-info w-100">
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
                $libconfirming="select regno from students where library = '1' and regno='$regno' ";
                $libconfirmingrun=mysqli_query($conn,$libconfirming);
                $libconfirmingrunnum=mysqli_num_rows($libconfirmingrun);
                if($libconfirmingrunnum==1){
                    echo "You have cleared with library";
                }
                else{
                    $liboo="select regno from clearance  where  regno='$regno' and department='library' ";
                    $liboorun=mysqli_query($conn,$liboo);
                    $liboorunnum=mysqli_num_rows($liboorun);

                    if($liboorunnum=='1'){
                        echo"Request pending";
                    }
                    else{
                        echo '<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value=' . $regno . '>
                <input type="text" hidden=""  name="department" value="library">
                
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
                    }
                }

            }
            ?>
        </div>
        <div class="products bg-info w-100">
       <p class="text-center">Boardings</p>
            <div class="contents d-flex flex-column justify-content-center ms-1 ">
                <p class="text-center">Items to clear</p>
                <p class="text-center"><?php echo $boardingnum; ?></p>
                <?php if($boardingnum>0){
                    echo "<p class='text-center'><a  href='boarding.php'>view</a></p>";
                }?>
            </div>
            <?php
            if($boardingnum==0){
                $boardingming="select regno from students where boardings = '1' and regno='$regno' ";
                $boardingmingrun=mysqli_query($conn,$boardingming);
                $boardingmingrunrunnum=mysqli_num_rows($boardingmingrun);
                if($boardingmingrunrunnum==1){
                    echo "You have cleared with Boardings";
                }
                else{
                    $boardii="select regno from clearance  where  regno='$regno' and department='boarding' ";
                    $boardiirun=mysqli_query($conn,$boardii);
                    $boardiirunnum=mysqli_num_rows($boardiirun);
//                    echo $boardiirunnum;

                    if($boardiirunnum=='1'){
                        echo"Request pending";
                    }
                    else{
                        echo '<div class="contents d-flex flex-column justify-content-center ms-1 ">
                <form action="studentprocessor.php" method="post">
                <input type="text" hidden="" name="regno" value=' . $regno . '>
                <input type="text" hidden=""  name="department" value="boarding">
                
                <button name="clearnow" class="btn  btn-primary my-3">
                    Clear now
                </button>
                </form>
            </div>';
                    }
                }

            }
            ?>
        </div>


    </div>

</div>