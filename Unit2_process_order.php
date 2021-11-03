 <?php include 'Unit2_header.php';?>
<?php include 'Unit2_database.php';?>


<?php
// $product = $_POST["product"];
// $quantity = floatval($_POST["quantity"]);
// $price = floatval(explode("-", $_POST["product"])[1]);
// $subtotal = $price * $quantity;
// $tax_price = $subtotal * 1.03;
// $round_price = ceil($tax_price);

// $donation = "";
// if($_POST["donate"]){
//         $donation = "Total with donation: $" . strval($round_price);
// }
$conn = getConnection();
$newCust = findCustomer($conn, $_POST['email']);

$product = findProductById($conn, $_POST['product']);
$product_name = $product['product_name'];
$price = $product['price'];
$subtotal = $price * $_POST["quantity"];
$tax = $subtotal * 0.03;
$tax_price = $subtotal * $tax;
$donation = ceil($tax_price);
$timestamp = 0.0;
$donation_text = "";
if($_POST["donate"]){
        $donation_text = "Total with donation: $" . $donation;
}

if ($newCust) {
	addOrder($conn, $newCust['id'], $_POST['product'], $_POST["quantity"], $price, 0.03, $donation, $timestamp);
}
else{
	addCustomer($conn, $_POST['fname'], $_POST['lname'], $_POST['email']);
	$cust = findCustomer($conn, $_POST['email']);
	addOrder($conn, $cust['id'], $_POST['product'], $_POST["quantity"], $price, 0.03, $donation, $timestamp);
}
?>



<html>
<head>
	<title>PHP Store</title>
	<meta charset="UTF-8">
	<meta name="author" content="Lauren Champlin">
	<link rel="stylesheet" href="Unit2_common.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<br>
<br>

<p>Hello <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"]; ?>
<?php
if ($newCust) { 
	echo " - <em>Thank you for becoming a customer!</em></p>";
} else { 
	echo " - <em>Welcome back!</em></p>"; 
}?>
<p>We hope you enjoy your <?php $product_name?> candy!</p>
<p>Order Details:
<?php $_POST["quantity"]?> @ <?php $price?>
	Tax (3%): <?php $tax?>
	Subtotal: <?php $tax_price?>
	<?php echo $donation_text ?>
</p>
<p>We will send special offers to <?php $_POST['email']?><p>

<!-- <p>Thank you for your order, <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"]; ?> (<?php echo $_POST["email"]; ?>). </p>
<p>You have selected <?php echo $_POST["quantity"]; ?>  <?php echo $product;?> @ $<?php echo $price;?></p>
<p>Subtotal: $<?php echo $subtotal;?></p>
<p>Total including tax (3%): $<?php echo $tax_price;?></p>
<p><?php echo $donation ?></p> -->

</body>
</html>

 <?php include 'Unit2_footer.php';?>

