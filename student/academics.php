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
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="academics.php">Academics</a></li>
                <li><a href="library.php">Library</a></li>
                <li><a href="finance.php">Finance</a></li>
            </ul>
        </div>
    </div>
    <div class="main_content w-75 border-start h">
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
            $academic="select * from academics where regno='$regno' and status=0";
            $academicrun=mysqli_query($conn,$academic);
            while($posts=mysqli_fetch_assoc($academicrun)) {
            ?>

            <tr>
                <td><?php echo $posts['regno'] ?></td>
                <td><?php echo $posts['category'] ?></td>
                <td><?php echo $posts['description'] ?></td>
                <td>
                <?php
                if($posts['category']=='Missing Marks') {
            echo sprintf('
                     <form action="studentprocessor.php" method="post">
                         <input type="text" hidden="" name="id" value="%s">
                         <input type="text" hidden="" name="regno" value="%s">
                         <input type="text" hidden="" name="category" value="%s">
                         <button type="submit" name="retake" class="btn btn-success">Retake</button>
                     </form>
            ', $posts['id'],$posts['regno'],$posts['category']
            );
                }
                elseif ($posts['category']=='Fail'){
                    echo sprintf('
                     <form action="studentprocessor.php" method="post">
                         <input type="text" hidden="" name="id" value="%s">
                         <input type="text" hidden="" name="regno" value="%s">
                         <input type="text" hidden="" name="category" value="%s">
                         <button type="submit" name="retake" class="btn btn-success">Request Sup</button>
                     </form>
            ', $posts['id'],$posts['regno'],$posts['category']
                    );
                }
                elseif ($posts['category']=='Unattempted CAT'){
                    echo sprintf('
                     <form action="studentprocessor.php" method="post">
                         <input type="text" hidden="" name="id" value="%s">
                         <input type="text" hidden="" name="regno" value="%s">
                         <input type="text" hidden="" name="category" value="%s">
                         <button type="submit" name="retake" class="btn btn-success">Request special</button>
                     </form>
            ', $posts['id'],$posts['regno'],$posts['category']
                    );
                }
                    ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <p>Pending Clearance</p>
        <table class="table table-primary table-bordered">
            <tr>
                <th>Admission</th>
                <th>Category</th>
                <th>Description</th>
                <th colspan="2">Operation</th>
            </tr>
            <?php
            $academic="select * from academics where regno='$regno' and status!=0";
            $academicrun=mysqli_query($conn,$academic);
            while($posts=mysqli_fetch_assoc($academicrun)) {
                ?>

                <tr>
                    <td><?php echo $posts['regno'] ?></td>
                    <td><?php echo $posts['category'] ?></td>
                    <td><?php echo $posts['description'] ?></td>
                    <td><?php if($posts['response']==''){
                        echo "Wait for respond  before";
                        }
                        else{
                            echo $posts['response'];
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>


    </div>
</div>