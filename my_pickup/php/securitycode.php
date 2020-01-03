<?php
error_reporting(0);
include_once("dbConnect.php");
$email = $_POST['email'];
$number = rand(1111,9999);
$stringNum = (string)$number;
$subject = 'Password reset security code';
$message = 'Enter this security code to reset your password : '. "\r\n" .$stringNum;
$headers = 'From: noreply_mypickup@pickupandlaundry.com' . "\r\n" . 
    'Reply-To: '.$email . "\r\n" . 
    'X-Mailer: PHP/' . phpversion();
    
$sql = "SELECT * FROM driver WHERE driver_email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    mail($email, $subject, $message, $headers);
    echo $stringNum;
}else{
    echo "error";
}
?>