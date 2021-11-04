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

function findProductById($conn, $productId) {
        $query = "select * from Product where id = ?";
        $stmt = $conn->prepare( $query );
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
        }
        else {
                return 0;
        }
}

function findCustomer($conn, $email) {
        $query = "select * from Customer where email = ?";
        $stmt = $conn->prepare( $query );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
        }
        else {
                return 0;
        }
}

function findOrder($conn, $custId, $productId, $timestamp) {
        $query = "select * from Orders where customer_id = ? and product_id = ? and timestamp = ?";
        $stmt = $conn->prepare( $query );
        $stmt->bind_param("iii", $custId, $productId, $timestamp);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
        }
        else {
                return 0;
        }
}

function addOrder($conn, $custId, $productId, $qty, $price, $tax, $donation, $timestamp) {
        if(findOrder($conn, $custId, $productId, $timestamp) != 0){
                $query = "insert into Orders (product_id, customer_id, quantity, price, tax, donation, timestamp) values (?,?,?,?,?,?,?)";
                $stmt = $conn->prepare( $query );
                $stmt->bind_param("iiidddi", $productId, $custId, $qty, $price, $tax, $donation, $timestamp);
                $stmt->execute();
                $stmt->close();
        }
}

function addCustomer($conn, $first, $last, $email) {
        $query = "insert into Customer (first_name, last_name, email) values (?,?,?)";
        $stmt = $conn->prepare( $query );
        $stmt->bind_param("sss", $first, $last, $email);
        $stmt->execute();
        $stmt->close();
}

function updateQuantity($conn, $productId, $qty) {
        $query = "update Product set in_stock = ? where id = ?";
        $stmt = $conn->prepare( $query );
        $stmt->bind_param("ii", $qty, $productId);
        $stmt->execute();
        $stmt->close();
}

?> 
