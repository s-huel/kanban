<?php

require 'database/connect.php';

$lanes = $pdo->query("SELECT * FROM lane")->fetchAll(PDO::FETCH_ASSOC);

function getItems($pdo, $laneId)
{
    $stmt = $pdo->prepare("SELECT * FROM item WHERE lane_id = :lane_id");
    $stmt->execute(['lane_id' => $laneId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo-List</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <div class="board">
    <div class="column">
      <h2>Todo</h2>
      <div class="line"></div>
    </div>

    <div class="column">
      <h2>In Progress</h2>
      <div class="line"></div>
    </div>
    
    <div class="column">
      <h2>Done</h2>
      <div class="line"></div>
    </div>
  </div>

</body>
</html>
