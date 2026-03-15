<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$user=$_SESSION['user'];

if(isset($_POST['sell'])){

$credits=$_POST['credits'];
$price=$_POST['price'];

$conn->query("INSERT INTO marketplace(seller_id,credits,price)
VALUES($user,$credits,$price)");

$msg="Credits Listed Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sell Carbon Credits</title>
<link rel="stylesheet" href="../css/user.css">
</head>

<body>

<div class="dashboard">

<h2>Sell Carbon Credits</h2>

<?php if(isset($msg)){ echo "<p class='success'>$msg</p>"; } ?>

<form method="POST" class="sell-form">

<label>Credits</label>
<input type="number" name="credits" required>

<label>Price per Credit (₹)</label>
<input type="number" name="price" required>

<button name="sell" class="btn">Sell Credits</button>

</form>

<a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>