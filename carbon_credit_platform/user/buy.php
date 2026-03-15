<?php
session_start();
include("../config/db.php");

$id=$_GET['id'];
$buyer=$_SESSION['user'];

$row=$conn->query("SELECT * FROM marketplace WHERE id=$id")->fetch_assoc();

$seller=$row['seller_id'];
$credits=$row['credits'];
$price=$row['price'];

$total=$credits*$price;

$conn->query("UPDATE marketplace SET status='sold' WHERE id=$id");

$conn->query("INSERT INTO transactions
(buyer_id,seller_id,credits,price)
VALUES($buyer,$seller,$credits,$total)");

include("../blockchain/log_transaction.php");

echo "Purchase Successful";
?>