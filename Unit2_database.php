<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
?>
<?php
function getConnection(){
include "Unit2_database_credentials.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
return $conn;
}
function getCustomers($conn){
$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);
return $result;
}
?> 
