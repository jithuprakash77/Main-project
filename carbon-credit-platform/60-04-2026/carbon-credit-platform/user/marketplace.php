<?php
session_start();
include("../config/db.php");

$res = $conn->query("SELECT * FROM marketplace WHERE status='available'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Marketplace</title>

<!-- Web3 -->
<script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script>

<!-- Your JS -->
<script src="../js/app.js"></script>

</head>
<body>

<h2>Marketplace</h2>

<?php while($row=$res->fetch_assoc()){ ?>

    <div style="border:1px solid #000; padding:10px; margin:10px;">
        <p>Credits: <?php echo $row['credits']; ?></p>

        <!-- ✅ MetaMask Button -->
        <button onclick="buyCredit(<?php echo $row['id']; ?>, <?php echo $row['credits']; ?>)">
    Buy
</button>
    </div>

<?php } ?>

</body>
</html>