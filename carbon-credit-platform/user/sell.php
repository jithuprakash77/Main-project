<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$user=$_SESSION['user'];
$message="";

if(isset($_POST['sell'])){

$credits=$_POST['credits'];

/* check seller credits */

$res=$conn->query("SELECT credits FROM carbon_credits WHERE user_id=$user");
$row=$res->fetch_assoc();

if($credits > $row['credits']){
$message="You do not have enough credits";
}else{

$conn->query("INSERT INTO marketplace(seller_id,credits,status)
VALUES($user,$credits,'available')");

$message="Credits Listed Successfully";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sell Carbon Credits</title>
<link rel="stylesheet" href="../css/sell.css">
</head>

<body>

<div class="container">

<h2>Sell Carbon Credits</h2>

<?php if($message!=""){ ?>
<p class="message"><?php echo $message; ?></p>
<?php } ?>

<form method="POST" class="sell-form">

<div class="input-group">
<label>Credits</label>
<input type="number" name="credits" required>
</div>

<button type="submit" name="sell" class="btn">Sell Credits</button>

</form>

<a href="dashboard.php" class="back">Back to Dashboard</a>

</div>

</body>
</html>