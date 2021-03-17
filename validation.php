<?php

session_start();

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

$q = "select * from login where username = '$name' && password = '$pass'";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if($num == 1){
    
    $_SESSION['username'] = $name;
    header('location:home.php');

}else{
    
    header('location:login.php');

}


?>