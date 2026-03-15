<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$user=$_SESSION['user'];

/* credits */

$res=$conn->query("SELECT credits FROM carbon_credits WHERE user_id=$user");
$row=$res->fetch_assoc();

/* wallet */

$res2=$conn->query("SELECT wallet_balance FROM users WHERE user_id=$user");
$row2=$res2->fetch_assoc();
?>

<h2>User Dashboard</h2>

<p>Your Carbon Credits: <?php echo $row['credits']; ?></p>

<p>Your Wallet Balance: ₹<?php echo $row2['wallet_balance']; ?></p>

<br>

<a href="marketplace.php">Marketplace</a><br><br>

<a href="sell.php">Sell Credits</a>