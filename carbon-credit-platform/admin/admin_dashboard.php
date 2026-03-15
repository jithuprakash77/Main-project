<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: admin_login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<div class="dashboard">

<h2>Admin Dashboard</h2>

<div class="menu">
<a href="add_usage.php" class="btn">Add Electricity Usage</a>
</div>

</div>

</body>
</html>