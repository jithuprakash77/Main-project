<?php

session_start();
include("../config/db.php");

if(isset($_POST['login']))
{

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1)
{

$row=mysqli_fetch_assoc($result);

if($password==$row['password'])
{

$_SESSION['user']=$row['user_id'];

header("Location: ../user/dashboard.php");

}
else
{
echo "Incorrect password";
}

}
else
{
echo "User not found";
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Insert style.css file -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
   
</head>
<body>

    

    <div id="frm">
        <h1>Login</h1>
        <form method="POST">
            <p>
                <label>UserName:</label>
                <input type="text" id="email" name="email" />
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="password" name="password" />
            </p>
            <p>
                <input type="submit" name="login" class="btn" value="Login" />
            </p>
        </form>
        
    <div class="signup-link">
           <a href="forgotpassword.php">Forgot password??</a>
        </div>
    </div>
    </div>

    <!-- Validation for empty fields -->
    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;

            if (id.length === 0 && ps.length === 0) {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length === 0) {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length === 0) {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
    <script>
  document.addEventListener('mousemove', e => {
    const splash = document.createElement('div');
    splash.classList.add('splash');
    splash.style.left = e.pageX + 'px';
    splash.style.top = e.pageY + 'px';
    document.body.appendChild(splash);

    // remove after animation
    setTimeout(() => splash.remove(), 500);
  });
</script>
</body>

</html>