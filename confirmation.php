<?php
session_start();
include('db.php');
$result = mysqli_query($con,"SELECT * FROM customer_details");
$result1 = mysqli_query($con,"SELECT * FROM payment");
?>
<head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class = "container">
    <a href="logout.php"> LOGOUT </a> 
</div>
<?php
$row = mysqli_fetch_assoc($result);
$row1 = mysqli_fetch_assoc($result1);
echo "<div>
    <h2>The products will be delivered to the address ".$row ['address1']." to ".$row1 ['first_name']." ".$row1 ['last_name'].". <br>Thank you for shopping with us.</h2>
</div>"
?>