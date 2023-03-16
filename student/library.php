<?php
session_start();
$regno=$_SESSION['regno'];

?>
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

include '../header.php';
?>
<link rel="stylesheet" href="../css/style.css">
<script src="../app.js"></script>
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
    <div class="main_content w-75 border-start h">
        <table class="table table-primary table-bordered">
            <tr>
                <th>Admission</th>
                <th>Category</th>
                <th>Description</th>
                <th colspan="2">Operation</th>
            </tr>
            <?php
            $academic="select * from library where regno='$regno'";
            $academicrun=mysqli_query($conn,$academic);
            while($posts=mysqli_fetch_assoc($academicrun)) {
                ?>

                <tr>
                    <td><?php echo $posts['regno'] ?></td>
                    <td><?php echo $posts['category'] ?></td>
                    <td><?php echo $posts['description'] ?></td>
                    <td><button class="btn btn-secondary">Pay damage</button></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>