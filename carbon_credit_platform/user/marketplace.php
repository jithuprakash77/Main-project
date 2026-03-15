<?php
include("../config/db.php");

$res=$conn->query("SELECT * FROM marketplace WHERE status='available'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Marketplace</title>
<link rel="stylesheet" href="../css/user.css">
</head>

<body>

<div class="dashboard">

<h2>Carbon Credit Marketplace</h2>

<div class="market-container">

<?php
while($row=$res->fetch_assoc()){
?>

<div class="market-card">

<h3><?php echo $row['credits']; ?> Credits</h3>

<p>Price: ₹<?php echo $row['price']; ?></p>

<a href="buy.php?id=<?php echo $row['id']; ?>" class="btn">Buy Credits</a>

</div>

<?php } ?>

</div>

<a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>