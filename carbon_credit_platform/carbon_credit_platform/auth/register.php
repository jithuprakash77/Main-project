<?php
include("../config/db.php");

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$area=$_POST['area'];

$conn->query("INSERT INTO users(name,email,password,area)
VALUES('$name','$email','$password','$area')");

echo "Registration Successful";
}
?>

<h2>Register</h2>

<form method="POST">

Name <input name="name"><br><br>
Email <input name="email"><br><br>
Area <input name="area"><br><br>
Password <input type="password" name="password"><br><br>

<button name="submit">Register</button>

</form>