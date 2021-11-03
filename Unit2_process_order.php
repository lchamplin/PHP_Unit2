 <?php include 'Unit2_header.php';?>


<?php
$product = $_POST["product"];
$quantity = floatval($_POST["quantity"]);
$price = floatval(explode("-", $_POST["product"])[1]);
$subtotal = $price * $quantity;
$tax_price = $subtotal * 1.03;
$round_price = ceil($tax_price);

$donation = "";
if($_POST["donate"]){
        $donation = "Total with donation: $" . strval($round_price);
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
<p>Thank you for your order, <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"]; ?> (<?php echo $_POST["email"]; ?>). </p>
<p>You have selected <?php echo $_POST["quantity"]; ?>  <?php echo $product;?> @ $<?php echo $price;?></p>
<p>Subtotal: $<?php echo $subtotal;?></p>
<p>Total including tax (3%): $<?php echo $tax_price;?></p>
<p><?php echo $donation ?></p>

</body>
</html>

 <?php include 'Unit2_footer.php';?>

