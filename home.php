<?php

session_start();

if(!isset($_SESSION['username'])){
header('location:login.php');
}

include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$description = $row['description'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'description'=>$description,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
    $qy=" insert into customer_products(uid,code) values((select uid from login where username = '$_SESSION[username]'),'$code')";
    mysqli_query($con, $qy);
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
    $qy=" insert into customer_products(uid,code) values((select uid from login where username = '$_SESSION[username]'),'$code')";
    mysqli_query($con, $qy);
 }
 }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class = "container">
            <h2>Welcome <?php echo $_SESSION['username']; ?> </h2>
        </div>
        <?php
        if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        ?>
        <div class="cart_div">
            <a href="cart.php">Cart</a>
        </div>
        <?php
        }   
        ?>
        <div class = "container">
            <a href="logout.php"> LOGOUT </a> 
        </div>
        <?php
        $result = mysqli_query($con,"SELECT * FROM `products`");
        while($row = mysqli_fetch_assoc($result)){
        echo "<div class='product_wrapper'>
        <form method='post' action=''>
        <input type='hidden' name='code' value=".$row['code']." />
        <div class='image'><img src='".$row['image']."' width=80 height=80 /></div>
        <div class='name'>".$row['name']."</div>
        <div>".$row['description']."</div>
        <div class='price'>Rs ".$row['price']."</div>
        <button type='submit' class='buy'>Buy Now</button>
        </form>
        </div>";
        }
        mysqli_close($con);
        ?>
 
        <div style="clear:both;"></div>
 
        <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
        </div>
    </body>
</html>