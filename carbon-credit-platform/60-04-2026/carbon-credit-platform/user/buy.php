<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$tx = $_GET['tx'] ?? '';

if($tx != ''){
    $stmt = $conn->prepare("UPDATE marketplace SET status='sold', tx_hash=? WHERE id=?");
$stmt->bind_param("si", $tx, $id);
$stmt->execute();
}

echo "<h2>Purchase Successful</h2>";
echo "<p>Transaction Hash: $tx</p>";
?>