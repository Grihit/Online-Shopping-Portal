<?php

session_start();
header('location: login.php');

$con=mysqli_connect("localhost","root");
if($con){
    echo" connection successful";
}else{
    echo" no connection";
}

mysqli_select_db($con, 'shopping');

$name = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$mobile = $_POST['mobile_no'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];

$q = "select * from login where username = '$name'";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if($num == 1){
    echo" Username already taken";
}else{
    $qy=" insert into login(username,password) values('$name','$pass') ; ";
    mysqli_query($con, $qy);
    $qx=" insert into customer_details(uid,email_id,mobile_no,address1,address2) values((select uid from login where username = '$name'),'$email','$mobile','$address1','$address2')";
    mysqli_query($con, $qx);
}


?>