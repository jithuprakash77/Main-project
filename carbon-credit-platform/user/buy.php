<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$buyer=$_SESSION['user'];
$id=$_GET['id'];

/* get listing */

$res=$conn->query("SELECT * FROM marketplace WHERE id=$id AND status='available'");
$row=$res->fetch_assoc();

if(!$row){
die("Listing not available");
}

$seller=$row['seller_id'];
$credits=$row['credits'];

/* fixed price */

$priceRes=$conn->query("SELECT price FROM credit_price LIMIT 1");
$priceRow=$priceRes->fetch_assoc();
$price=$priceRow['price'];

$total=$credits*$price;

/* check buyer wallet */

$balRes=$conn->query("SELECT wallet_balance FROM users WHERE user_id=$buyer");
$balRow=$balRes->fetch_assoc();

if($balRow['wallet_balance'] < $total){
$message="Not enough wallet balance";
}
else{

/* deduct buyer wallet */

$conn->query("UPDATE users 
SET wallet_balance=wallet_balance-$total 
WHERE user_id=$buyer");

/* add seller wallet */

$conn->query("UPDATE users 
SET wallet_balance=wallet_balance+$total 
WHERE user_id=$seller");

/* transfer credits */

$conn->query("UPDATE carbon_credits 
SET credits=credits+$credits 
WHERE user_id=$buyer");

$conn->query("UPDATE carbon_credits 
SET credits=credits-$credits 
WHERE user_id=$seller");

/* mark listing sold */

$conn->query("UPDATE marketplace 
SET status='sold' 
WHERE id=$id");

/* transaction history */

$conn->query("INSERT INTO transactions(buyer_id,seller_id,credits,amount)
VALUES($buyer,$seller,$credits,$total)");

$message="Purchase Successful";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Purchase Status</title>
<link rel="stylesheet" href="../css/buy.css">
</head>

<body>

<div class="container">

<h2>Transaction Status</h2>

<p class="message"><?php echo $message; ?></p>

<a href="marketplace.php" class="btn">Back to Marketplace</a>

</div>

</body>
</html>