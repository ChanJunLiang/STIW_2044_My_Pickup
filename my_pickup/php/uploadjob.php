<?php
error_reporting(0);
include_once ("dbConnect.php");

$jobname = $_POST['job_name'];
$jobprice = $_POST['job_price'];
$jobdesc = $_POST['job_desc'];
$joblocation = $_POST['job_location'];
$jobdestination = $_POST['job_destination'];
$email = $_POST['email'];
$credit = $_POST['credit'];
$jobdate =  date('dmYhis');

$sqlinsert = "INSERT INTO job(job_name,job_price,job_desc,job_location,job_destination,user_email,job_date) VALUES ('$jobname','$jobprice','$jobdesc','$joblocation','$jobdestination','$email','$jobdate')";

if ($conn->query($sqlinsert) === TRUE) {
    $newcredit = $credit - 1;
    $sqlcredit = "UPDATE driver SET credit = '$newcredit' WHERE driver_email = '$email'";
    $conn->query($sqlcredit);
    echo "success";
} else {
    echo "failed";
}
?>