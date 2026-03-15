<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$user=$_SESSION['user'];

$res=$conn->query("SELECT credits FROM carbon_credits WHERE user_id=$user");
$row=$res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="../css/user.css">
</head>

<body>

<div class="dashboard">

<h2>User Dashboard</h2>

<div class="credit-card">
<h3>Your Carbon Credits</h3>
<p><?php echo $row['credits']; ?></p>
</div>

<div class="menu">
<a href="marketplace.php" class="btn">Marketplace</a>
<a href="sell.php" class="btn">Sell Credits</a>
</div>

</div>

</body>
</html>