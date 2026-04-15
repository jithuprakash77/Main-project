<?php
session_start();
include("../config/db.php");

$res = $conn->query("SELECT * FROM marketplace WHERE status='available'and id NOT IN (SELECT id FROM marketplace WHERE seller_id={$_SESSION['user']})");
?>

<!DOCTYPE html>
<html>
<head>
<title>Marketplace</title>

<script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>
<script src="../js/app.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
background:linear-gradient(135deg,#11998e,#38ef7d);
padding:40px;
}

h2{
text-align:center;
color:white;
margin-bottom:30px;
}

.marketplace{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:20px;
max-width:1000px;
margin:auto;
}

.card{
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
text-align:center;
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
}

.credits{
font-size:24px;
font-weight:600;
color:#27ae60;
margin-bottom:15px;
}

input{
width:100%;
padding:10px;
border-radius:8px;
border:1px solid #ccc;
margin-bottom:15px;
outline:none;
}

button{
width:100%;
padding:12px;
border:none;
border-radius:8px;
background:#27ae60;
color:white;
font-weight:500;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#1e874b;
transform:scale(1.05);
}

.empty{
text-align:center;
color:white;
margin-top:50px;
}
</style>

</head>
<body>

<h2>🌿 Carbon Credit Marketplace</h2>

<div class="marketplace">

<?php 
$hasData = false;
while($row=$res->fetch_assoc()){ 
$hasData = true;
?>

<div class="card">
    
    <div class="credits">
        <?php echo $row['credits']; ?> Credits
    </div>

    <input type="number" 
           id="qty_<?php echo $row['id']; ?>" 
           min="1" 
           max="<?php echo $row['credits']; ?>" 
           placeholder="Enter amount">

    <button onclick="buyCredit(
        <?php echo $row['id']; ?>,
        document.getElementById('qty_<?php echo $row['id']; ?>').value
    )">
        Buy Now
    </button>

</div>

<?php } ?>

</div>

<?php if(!$hasData){ ?>
<div class="empty">
    <h3>No credits available</h3>
</div>
<?php } ?>

</body>
</html>