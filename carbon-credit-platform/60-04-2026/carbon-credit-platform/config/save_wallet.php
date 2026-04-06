<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    exit();
}

$user=$_SESSION['user'];

$wallet=$_POST['wallet'];

$conn->query("UPDATE users SET wallet='$wallet' WHERE id=$user");

echo "Wallet Saved";
?>