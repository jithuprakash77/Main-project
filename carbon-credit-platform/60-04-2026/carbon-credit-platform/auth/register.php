<?php
include("../config/db.php");

$message="";

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$area=$_POST['area'];

$conn->query("INSERT INTO users(name,email,password,area)
VALUES('$name','$email','$password','$area')");

$message="Registration Successful";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<link rel="stylesheet" href="../css/register.css">
</head>

<body>

<div class="container">

<h2>Create Account</h2>

<?php if($message!=""){ ?>
<p class="message"><?php echo $message; ?></p>
<?php } ?>

<form method="POST" class="form">

<div class="input-group">
<label>Name</label>
<input type="text" name="name" required>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Area</label>
<input type="text" name="area" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit" name="submit" class="btn">Register</button>

</form>

<a href="login.php" class="login-link">Already have an account? Login</a>

</div>

</body>
</html>