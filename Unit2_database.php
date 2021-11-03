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
function getProducts($conn){
$sql = "SELECT * FROM Product";
$result = mysqli_query($conn, $sql);
return $result;
}

// function findProductById($conn, $productId) {
//         $query = "select * from Product where id = ?";
//         $stmt = $conn->prepare( $query );
//         $stmt->bind_param("i", $productId);
//          
//         $stmt->execute();
//         $result = $stmt->get_result(); // get the mysqli result
//         if ($result->num_rows > 0) {
//                 $row =  $result->fetch_assoc();
//                 return $row;
//         }
//         else {
//                 return 0;
//         }
// }

// function insertOrder($conn, $productId, $customerId, $quantity, )



?> 
