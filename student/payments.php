<?php
include '../connection.php';
if(isset($_POST['clear'])) {
    $regno=$_POST['regno'];
    $department=$_POST['department'];

    $dept_id=$_POST['dept_id'];
    $cost=$_POST['cost'];
    $feebalance="select * from finance where regno='$regno'";
    $feebalancerun=mysqli_query($conn,$feebalance);
    $fees = mysqli_fetch_all($feebalancerun, MYSQLI_ASSOC);
    foreach ($fees as $fee){
        $exactbalance=$fee['feebalance'];
    }
        if($cost>$exactbalance){
            session_start();
            $_SESSION['status'] = 'You need to first pay the fees before clear this amount because it is tooo high';
            header("Location:index.php");
            die();
        }
        else{
            $updatedfeebalance=$exactbalance-$cost;
//            echo $updatedfeebalance;
            $feesupdate="update finance set feebalance='$updatedfeebalance' where regno='$regno'";
            $feesupdaterun=mysqli_query($conn,$feesupdate);
            if($feesupdaterun){
                $departmentupdate="update $department set status='1' where regno='$regno' and id=' $dept_id'";
                $departmentupdaterun=mysqli_query($conn,$departmentupdate);
                if($departmentupdaterun){
                    session_start();
                    $_SESSION['status'] = 'You have successfully cleared from this department';
                    header("Location:index.php");
                }
            }
        }
}

?>
