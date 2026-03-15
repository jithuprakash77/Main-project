<?php

$hash=hash("sha256",rand());

$conn->query("UPDATE transactions
SET blockchain_hash='$hash'
ORDER BY id DESC LIMIT 1");

?>