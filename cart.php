<?php
session_start();
include('db.php');
$result = mysqli_query($con,"SELECT * FROM customer_details");
$status="";
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
   
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class = "container">
    <a href="logout.php"> LOGOUT </a> 
</div>
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>PRICE</td>
<td>ITEMS TOTAL</td>
</tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<td><?php echo $product["description"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1){ ?>selected="true" <?php }; ?>
value="1">1</option>
<option <?php if($product["quantity"]==2){ ?>selected="true" <?php }; ?>
value="2">2</option>
<option <?php if($product["quantity"]==3){ ?>selected="true" <?php }; ?>
value="3">3</option>
<option <?php if($product["quantity"]==4){ ?>selected="true" <?php }; ?>
value="4">4</option>
<option <?php if($product["quantity"]==5){ ?>selected="true" <?php }; ?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs ".$product["price"]; ?></td>
<td><?php echo "Rs ".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs ".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<div class='product_wrapper'>
    <a href="checkout.php"><button type='submit' class='buy'>Checkout</button></a>
</div>
