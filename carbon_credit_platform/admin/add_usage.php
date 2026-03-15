<?php
include("../config/db.php");

if(isset($_POST['submit'])){

$user=$_POST['user'];
$month=$_POST['month'];
$units=$_POST['units'];

$emission=$units*0.82;

$limit=150;

$credits=$limit-$emission;

$conn->query("INSERT INTO electricity_usage(user_id,month,units,emission)
VALUES($user,'$month',$units,$emission)");

$conn->query("UPDATE carbon_credits
SET credits=credits+$credits
WHERE user_id=$user");

$msg="Data Added Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Electricity Usage</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<div class="form-container">

<h3>Add Electricity Usage</h3>

<?php if(isset($msg)){ echo "<p class='success'>$msg</p>"; } ?>

<form method="POST">

<label>User ID</label>
<input type="number" name="user" required>

<label>Month</label>
<input type="text" name="month" placeholder="Example: January" required>

<label>Units Consumed</label>
<input type="number" name="units" required>

<button name="submit">Submit</button>

</form>

<a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>