<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
header("Location: ../auth/login.php");
exit();
}

$user=$_SESSION['user'];

/* credits */

$res=$conn->query("SELECT credits FROM carbon_credits WHERE user_id=$user");
$row=$res->fetch_assoc();

/* wallet */

$res2=$conn->query("SELECT wallet_balance FROM users WHERE user_id=$user");
$row2=$res2->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="../css/user.css">
<script>
async function connectWallet(){

    if(typeof window.ethereum !== 'undefined'){

        try{
            const accounts = await window.ethereum.request({
                method: 'eth_requestAccounts'
            });

            const wallet = accounts[0];

            document.getElementById("walletAddress").innerText =
                "Connected: " + wallet;

            // send wallet to PHP
            fetch("save_wallet.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "wallet=" + wallet
            });

        } catch(error){
            console.error(error);
            alert("Connection failed");
        }

    } else {
        alert("Please install MetaMask");
    }
}
</script>
</head>

<body>

<div class="dashboard">

    <div class="title">
        <h2>User Dashboard</h2>
    </div>

    <div class="cards">

        <div class="card credits">
            <h3>Carbon Credits</h3>
            <p><?php echo $row['credits']; ?></p>
        </div>

        <div class="card wallet">
            <h3>Wallet Balance</h3>
            <p>₹<?php echo $row2['wallet_balance']; ?></p>
        </div>

    </div>

    <div class="actions">
<button onclick="connectWallet()" class="btn">Connect Wallet</button>

<p id="walletAddress"></p>
        <a href="marketplace.php" class="btn">Marketplace</a>

        <a href="sell.php" class="btn">Sell Credits</a>

    </div>
    

</div>

</body>
</html>