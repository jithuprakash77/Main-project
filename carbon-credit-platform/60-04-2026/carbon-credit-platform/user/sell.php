<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit();
}

$user=$_SESSION['user'];

// get user wallet
$res=$conn->query("SELECT wallet FROM users WHERE user_id=$user");
$row=$res->fetch_assoc();
$wallet=$row['wallet'];

if(isset($_POST['sell'])){

    $credits=$_POST['credits'];
    

    // CALL BLOCKCHAIN API
    $url="http://localhost:3000/sell/$wallet/$credits";
    $response=@file_get_contents($url);

    // store in marketplace
    $conn->query("INSERT INTO marketplace(seller_id,credits,status)
    VALUES($user,$credits,'available')");

    $msg="Credits listed successfully (Blockchain + Marketplace)";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sell Credits</title>
<link rel="stylesheet" href="../css/user.css">
</head>

<body>

<div class="dashboard">

<h2>Sell Carbon Credits</h2>

<?php if(isset($msg)) echo "<p class='success'>$msg</p>"; ?>

<form method="POST" class="sell-form">

<label>Credits</label>
<input type="number" name="credits" required>



<button name="sell" class="btn">Sell Credits</button>

</form>

<a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>