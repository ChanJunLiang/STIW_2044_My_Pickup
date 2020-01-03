<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM driver WHERE driver_email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        echo "success,".$row["driver_name"].",".$row["driver_email"].",".$row["driver_phone"].",".$row["credit"]."";
    }
}else{
    echo "failed,null,null,null,null";
}