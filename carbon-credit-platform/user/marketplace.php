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
?>

<!DOCTYPE html>
<html>
<head>
<title>Carbon Credit Marketplace</title>
<link rel="stylesheet" href="../css/marketplace.css">
</head>

<body>

<div class="container">

<h2>Carbon Credit Marketplace</h2>

<div class="marketplace">

<?php
while($row=$res->fetch_assoc()){

if($row['seller_id']==$user){
continue;
}

$total=$row['credits']*$price;
?>

<div class="card">

<div class="seller">
Seller: <?php echo $row['email']; ?>
</div>

<div class="credits">
Credits: <?php echo $row['credits']; ?>
</div>

<div class="price">
Price per credit: ₹<?php echo $price; ?>
</div>

<div class="total">
Total cost: ₹<?php echo $total; ?>
</div>

<a href="buy.php?id=<?php echo $row['id']; ?>" class="buy-btn">Buy Credits</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>