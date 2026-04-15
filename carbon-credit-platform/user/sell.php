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

    $credits = (int)$_POST['credits'];

// check balance first
$res2 = $conn->query("
    SELECT credits FROM carbon_credits WHERE user_id = $user
");
$row2 = $res2->fetch_assoc();
$currentCredits = $row2['credits'];

if($credits > $currentCredits){
    $msg = "❌ Not enough credits";
} else {

    // ✅ DEDUCT immediately
    $conn->query("
        UPDATE carbon_credits 
        SET credits = credits - $credits 
        WHERE user_id = $user
    ");

    // blockchain call
    $url="http://localhost:3000/sell/$wallet/$credits";
    $response=@file_get_contents($url);

    // marketplace listing
    $conn->query("
        INSERT INTO marketplace(seller_id,credits,status)
        VALUES($user,$credits,'available')
    ");

    header("Location: dashboard.php");
    exit();
}
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