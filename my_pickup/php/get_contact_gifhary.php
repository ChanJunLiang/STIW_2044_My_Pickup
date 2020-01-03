<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['driver_email'];

$sql = "SELECT driver_phone FROM driver WHERE driver_email = '$email'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result ->fetch_assoc();
    echo json_encode($row);
}else{
    echo "failed";
}

?>