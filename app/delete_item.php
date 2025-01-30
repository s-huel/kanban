<?php

require 'database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    $stmt = $pdo->prepare("DELETE FROM item WHERE id = :item_id");
    $stmt->execute(['item_id' => $item_id]);

    header('Location: index.php');
    exit;
}

?>
