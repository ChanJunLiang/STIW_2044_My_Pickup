<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM job where user_email = '$email' and driver_email is NULL ORDER BY job_id DESC ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["jobs"] = array();
    while ($row = $result ->fetch_assoc()){
        $joblist = array();
        $joblist[job_id] = $row["job_id"];
        $joblist[job_name] = $row["job_name"];
        $joblist[job_price] = $row["job_price"];
        $joblist[job_desc] = $row["job_desc"];
        $joblist[job_location] = $row["job_location"];
        $joblist[job_destination] = $row["job_destination"];
        $joblist[job_owner] = $row["user_email"];
        $date = DateTime::createFromFormat('dmYHis', $row["job_date"]);
        $joblist[job_date] = $date->format('d/m/Y H:i:s');
        $joblist[driver_email] = $row["driver_email"];
        array_push($response["jobs"], $joblist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>