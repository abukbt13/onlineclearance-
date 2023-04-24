<?php
include '../connection.php';
$type = $_POST['name'];

// Query the database for the districts that belong to the selected region
$sql = "SELECT * FROM school_details WHERE name='$type'";
$result = mysqli_query($conn, $sql);

// Create an array of district names
$names = array();
while ($row = mysqli_fetch_assoc($result)) {
    $names[] = $row['course'];

}


// Return the district names as a JSON object
echo json_encode($names);
//echo json_encode($price);