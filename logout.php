<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_ns"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
session_start();

if(isset($_SESSION['tendangnhap']) != NULL){
    unset($_SESSION['tendangnhap']);
    header('Location: signin.php');
}

?>