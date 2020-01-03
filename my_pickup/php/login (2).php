<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['email'];
$password = $_POST['password'];
$passwordsha = sha1($password);

$sql = "SELECT * FROM driver WHERE DRIVER_EMAIL = '$email' AND DRIVER_PASSWORD = '$passwordsha' AND VERIFY ='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        echo "success,".$row["driver_name"].",".$row["driver_email"].",".$row["driver_phone"].",".$row["credit"];
    }
}else{
    echo "failed,null,null,null";
}
?>