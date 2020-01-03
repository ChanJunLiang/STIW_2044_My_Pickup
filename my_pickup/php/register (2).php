<?php
error_reporting(0);
include_once ("dbConnect.php");
$email = $_POST['email'];
$password = sha1($_POST['password']);
$password2 = sha1($_POST['password2']);
$phone = $_POST['phone'];
$name = $_POST['name'];
$encoded_string = $_POST["encoded_string"];
$decoded_string = base64_decode($encoded_string);


if($password == $password2){
    $sqlinsert = "INSERT INTO driver(driver_email, driver_name, driver_password, driver_phone, verify, credit) VALUES ('$email','$name','$password','$phone','0','30')";
} else{
    echo "Password not matched, please re-enter password";
    exit();
}

if ($conn->query($sqlinsert) === TRUE) {
    $path = '../profile/'.$email.'.jpg';
    file_put_contents($path, $decoded_string);
    sendEmail($email);
    echo "success";
} else {
    echo "failed";
}

function sendEmail($email) {
    $to      = $email; 
    $subject = 'Verification for MyPickup'; 
    $message = 'Please confirm your email using link bellow' . "\r\n \r\n" . 'http://pickupandlaundry.com/my_pickup/chan/php/verify.php?email='.$email;

    $headers = 'From: noreply_mypickup@pickupandlaundry.com' . "\r\n" . 
    'Reply-To: '.$email . "\r\n" . 
    'X-Mailer: PHP/' . phpversion(); 
    mail($to, $subject, $message, $headers);
}
?>