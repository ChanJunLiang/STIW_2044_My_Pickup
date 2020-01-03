<?php
error_reporting(0);
include_once("dbConnect.php");
$job_id = $_POST['job_id'];
$email = $_POST['email'];
$credit = $_POST['credit'];

$sql = "UPDATE job SET driver_email = '$email' WHERE job_id = '$job_id'";
if ($conn->query($sql) === TRUE) {
    $newcredit = $credit - 1;
    $sqlcredit = "UPDATE driver SET credit = '$newcredit' WHERE driver_email = '$email'";
    $conn->query($sqlcredit);
            echo "success";
        } else {
            echo "error";
        }
$conn->close();
?>
