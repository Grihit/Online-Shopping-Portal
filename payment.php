<?php

session_start();
header('location: confirmation.php');

$con=mysqli_connect("localhost","root");
if($con){
    echo" connection successful";
}else{
    echo" no connection";
}

mysqli_select_db($con, 'shopping');

$name = $_POST['username'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$card = $_POST['card_no'];
$bank = $_POST['bank_name'];
$code = $_POST['IFSC_code'];
$qx=" insert into payment(uid,first_name,last_name,card_no,bank_name,IFSC_code) values((select uid from login where username = '$_SESSION[username]'),'$first','$last','$card','$bank','$code')";
mysqli_query($con, $qx);
?>