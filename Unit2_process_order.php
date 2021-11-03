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

$newCust = findCustomer($conn, $_POST['email']);
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
<p>We hope you enjoy your PRODUCT candy!</p>
<p>Order Details:
	QUANTITY @ $PRICE: 
	Tax (3%): 
	Subtotal:
	Total:/Total with donation(thank you!):
</p>
<p>We will send special offers to EMAIL<p>

<!-- <p>Thank you for your order, <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"]; ?> (<?php echo $_POST["email"]; ?>). </p>
<p>You have selected <?php echo $_POST["quantity"]; ?>  <?php echo $product;?> @ $<?php echo $price;?></p>
<p>Subtotal: $<?php echo $subtotal;?></p>
<p>Total including tax (3%): $<?php echo $tax_price;?></p>
<p><?php echo $donation ?></p> -->

</body>
</html>

 <?php include 'Unit2_footer.php';?>

