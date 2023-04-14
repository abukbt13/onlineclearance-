<?php
session_start();
$regno=$_SESSION['regno'];
include '../connection.php';

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
            <ul> <li><a href="index.php">Home</a></li>
                <li><a href="academics.php">Academics</a></li>
                <li><a href="sports.php">Sports</a></li>
                <li><a href="boarding.php">Boarding</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="finance.php">Finance</a></li>
            </ul>
        </div>
    </div>
    <div class="main_content w-75 border-start ">
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
                <th>Description</th>
                <th colspan="2">Operation</th>
            </tr>
            <?php
            $academic="select * from boardings where regno='$regno' and status='0'";
            $academicrun=mysqli_query($conn,$academic);
            while($posts=mysqli_fetch_assoc($academicrun)) {
                ?>

                <tr>
                    <td><?php echo $posts['regno'] ?></td>
                    <td><?php echo $posts['category'] ?></td>
                    <td><?php echo $posts['description'] ?></td>
                    <td>
                        <form action="payments.php" method="post">
                            <input type="text" hidden=""  name="regno" value="<?php echo $posts['regno'] ?>">
                            <input type="text" hidden=""  name="department" value="boardings">
                            <input type="number" hidden="" name="dept_id" value="<?php echo $posts['id'] ?>">
                            <input type="number" name="cost" hidden=""  value="<?php echo $posts['cost'] ?>">
                            <button name="clear" class="btn btn-secondary">Pay now</button>
                        </form></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>