<?php
$conn = new mysqli("localhost","root","","carbon_trading1");

if($conn->connect_error){
die("Database connection failed");
}
?>