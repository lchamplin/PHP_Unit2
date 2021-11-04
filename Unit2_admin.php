<?php include 'Unit2_header.php';?>
<?php include 'Unit2_database.php';?>
<?php date_default_timezone_set("America/Denver");?>



<html>
<head>
	<title>PHP Store</title>
	<meta charset="UTF-8">
	<meta name="author" content="Lauren Champlin">
	<link rel="stylesheet" href="Unit2_store.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<?php
$conn = getConnection();
$customers = getCustomerTable($conn);
echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($customers))
{
echo "<tr>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>

</body>