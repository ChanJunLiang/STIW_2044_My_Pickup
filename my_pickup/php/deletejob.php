<?php
error_reporting(0);
include_once("dbConnect.php");
$job_id = $_POST['job_id'];

$sql = "DELETE FROM job WHERE job_id = '$job_id'";

if ($conn->query($sql) === TRUE) {
  echo "success";
}else{
    echo "failed";
}
?>