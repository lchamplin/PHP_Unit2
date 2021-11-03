<?php include 'Unit2_header.php';?>
<?php include 'Unit2_database.php';?>



<html>
<head>
	<title>PHP Store</title>
	<meta charset="UTF-8">
	<meta name="author" content="Lauren Champlin">
	<link rel="stylesheet" href="Unit2_store.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<form action="Unit2_process_order.php" method="post">
        <span>
        <br>
        <div class="personal">
        <fieldset class="personal">
    <legend>Personal</legend>
                <br>
                First Name: * <input type="text" name="fname" required pattern="[a-zA-Z'].{1,}"><br>
                Last Name: * <input type="text" name="lname" required pattern="[a-zA-Z'].{1,}"><br>
                E-mail: * <input type="email" name="email" required><br>
        </fieldset>
        </div>

          <div class="product">
   <fieldset class="product">
    <legend>Product</legend>
                <br>
                <select id="product" name="product" required onchange="showImage()">
                        <option value="" disabled selected hidden>Choose a product*</option>
                        <?php $Product = getProducts(getConnection()); ?>
                        <?php if ($Product): ?>
                                <?php foreach($Product as $row): ?> 
                                        <!-- data-image="<?= $row['image_name'] ?>" data-qty="<?= $row['in_stock'] ?>" <?= $row['id']?>   -->
                                        <option value = 1> <?= $row['product_name'] ?> - <?= $row['price'] ?> </option>                             
                                <?php endforeach?>
                        <?php endif?>
                        <!-- <option id="gummy_bears" value="Gummy Bears-5" onclick=showImage(value)>Gummy Bears - $5</option>
                        <option id="chocolates" value="Chocolates-3">Chocolates - $3</option>
                        <option id="caramels" value="Caramels-8">Caramels - $8</option> -->
                </select>
                <br>
                Quantity: * <input type="number" name="quantity" min=1 max=100  value=1 required><br>
</fieldset>
                <p>Would you like to round up to donate?</p>
                <span>
                        <input type="radio" id="yes" name="donate" value=1>
                        <label for="Yes">Yes</label><br>
                        <input type="radio" id="css" name="donate" value=0 checked>
                        <label for="No">No</label><br>
                </span>
</div>
        <button type="submit">Purchase</button>
</span>

</form>
<div class="picture">
        <p id="pic_text">Select a product to see it here</p>
        <img id="picture">
        <p id="stock_text"></p>

</div>
</body>
</html>

 <?php include 'Unit2_footer.php';?>

<script>
        function showImage() {
                var imgName = $("#product option:selected").attr('data-image');
                var stock = $("#product option:selected").attr('data-qty');
                console.log(imgName, stock);
                $('#picture').attr("src", "images/"+imgName.toString());
                if (stock == 0){
                        $('#stock_text').text("OUT OF STOCK");
                        $('#stock_text').css('color', 'red');
                }
                else if (stock < 5){
                        $('#stock_text').text("Only "+stock+" left in stock!");
                        $('#stock_text').css('color', 'blue');
                }
                else{
                        $('#stock_text').text("");
                        }
        }
</script>