<?php
session_start();
include("../config/db.php");

$user=$_SESSION['user'];

/* fixed credit price */

$priceRes=$conn->query("SELECT price FROM credit_price LIMIT 1");
$priceRow=$priceRes->fetch_assoc();
$price=$priceRow['price'];

/* marketplace listings */

$res=$conn->query("SELECT m.*, u.email 
FROM marketplace m
JOIN users u ON m.seller_id=u.user_id
WHERE m.status='available'");

echo "<h2>Carbon Credit Marketplace</h2>";

while($row=$res->fetch_assoc()){

if($row['seller_id']==$user){
continue;
}

$total=$row['credits']*$price;

echo "<b>Seller:</b> ".$row['email']."<br>";
echo "<b>Credits:</b> ".$row['credits']."<br>";
echo "<b>Price per credit:</b> ₹".$price."<br>";
echo "<b>Total cost:</b> ₹".$total."<br>";

echo "<a href='buy.php?id=".$row['id']."'>Buy</a>";

echo "<hr>";
}
?>