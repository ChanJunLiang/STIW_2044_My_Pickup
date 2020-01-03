<?php
error_reporting(0);
include_once("dbConnect.php");

$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$name = $_POST['name'];

$usersql = "SELECT * FROM driver WHERE driver_email = '$email'";

if (isset($name) && (!empty($name))){
    $sql = "UPDATE driver SET driver_name = '$name' WHERE driver_email = '$email'";
}
if (isset($password) && (!empty($password))){
    $sql = "UPDATE driver SET driver_password = sha1($password) WHERE driver_email = '$email'";
}
if (isset($phone) && (!empty($phone))){
    $sql = "UPDATE driver SET driver_phone = '$phone' WHERE driver_email = '$email'";
}

if ($conn->query($sql) === TRUE) {
    $result = $conn->query($usersql);
if ($result->num_rows > 0) {
        while ($row = $result ->fetch_assoc()){
        echo "success,".$row["driver_name"].",".$row["driver_password"].",".$row["driver_phone"].",".$row["driver_credit"];
        }
    }else{
        echo "failed,null,null,null,null";
    }
} else {
    echo "error";
}

$conn->close();
?>
