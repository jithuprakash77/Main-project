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

/* check seller credits */

$res=$conn->query("SELECT credits FROM carbon_credits WHERE user_id=$user");
$row=$res->fetch_assoc();

if($credits > $row['credits']){
echo "You do not have enough credits";
exit();
}

$conn->query("INSERT INTO marketplace(seller_id,credits,status)
VALUES($user,$credits,'available')");

echo "Credits Listed Successfully";
}
?>

<h2>Sell Carbon Credits</h2>

<form method="POST">

Credits <input type="number" name="credits" required><br><br>

<button name="sell">Sell</button>

</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>