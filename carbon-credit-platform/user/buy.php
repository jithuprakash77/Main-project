<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit();
}

$buyer = $_SESSION['user'];
$id = $_GET['id'];
$qty = $_GET['qty'];
$tx = $_GET['tx'] ?? '';

if($tx != ''){

    // get listing
    $res = $conn->query("SELECT credits, seller_id, status FROM marketplace WHERE id=$id");
    $row = $res->fetch_assoc();

    if($row['status'] == 'sold'){
        die("Already sold");
    }

    $available = $row['credits'];

    // ❌ prevent over-buy
    if($qty > $available){
        die("Not enough credits available");
    }

    $remaining = $available - $qty;

    if($remaining == 0){
        // full purchase
        $stmt = $conn->prepare("
            UPDATE marketplace 
            SET credits=0, status='sold', tx_hash=?, buyer_id=? 
            WHERE id=?
        ");
        $stmt->bind_param("sii", $tx, $buyer, $id);

    } else {
        // partial purchase
        $stmt = $conn->prepare("
            UPDATE marketplace 
            SET credits=?, tx_hash=? 
            WHERE id=?
        ");
        $stmt->bind_param("isi", $remaining, $tx, $id);
    }

    $stmt->execute();

    // ✅ store transaction as new row (ledger)
    $conn->query("
        INSERT INTO marketplace (seller_id, buyer_id, credits, status, tx_hash)
        VALUES ({$row['seller_id']}, $buyer, $qty, 'sold', '$tx')
    ");
}

echo "Purchase Successful";
$conn->query("
    UPDATE carbon_credits 
    SET credits = credits + $qty 
    WHERE user_id = $buyer
");
?>