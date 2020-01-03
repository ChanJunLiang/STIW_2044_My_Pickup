<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['email'];
$newPassword = $_POST['newPassword'];
$newPasswordsha = sha1($newPassword);

$sql = "UPDATE driver SET driver_password = '$newPasswordsha' WHERE driver_email = '$email'";
if ($conn->query($sql) === TRUE) {
            echo "Password Updated";
        } else {
            echo "error";
        }
$conn->close();
?>