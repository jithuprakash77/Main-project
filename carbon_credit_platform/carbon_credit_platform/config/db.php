<?php
$conn = new mysqli("localhost","root","","carbon_trading");

if($conn->connect_error){
die("Database connection failed");
}
?>