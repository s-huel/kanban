<?php

require 'database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'], $_POST['lane_id'])) {
    $item_id = $_POST['item_id'];
    $lane_id = $_POST['lane_id'];

    $next_lane_id = $lane_id + 1;

    if ($next_lane_id > 3) {
        $next_lane_id = 1;
    }

    $stmt = $pdo->prepare("UPDATE item SET lane_id = :lane_id WHERE id = :item_id");
    $stmt->execute(['lane_id' => $next_lane_id, 'item_id' => $item_id]);

    header('Location: index.php');
    exit;
}

?>