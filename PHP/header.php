<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebProject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


if (isset($_COOKIE['admin_session'])) {
    
    session_name('admin_session');
} elseif (isset($_COOKIE['customer_session'])) {
  
    session_name('customer_session');
}
session_start();
?>