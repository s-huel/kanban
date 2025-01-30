<?php

require 'database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['lane_id'])) {
    $title = $_POST['title'];
    $lane_id = $_POST['lane_id'];

    $stmt = $pdo->prepare("INSERT INTO item (lane_id, title) VALUES (:lane_id, :title)");
    $stmt->execute(['lane_id' => $lane_id, 'title' => $title]);

    header('Location: index.php');
    exit;
}

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
    <?php foreach ($lanes as $lane) : ?>
      <div class="column">
        <h2><?php echo htmlspecialchars($lane['title']); ?></h2>
        <div class="line"></div>
        
        <?php $items = getItems($pdo, $lane['id']); ?>
        <?php foreach ($items as $item) : ?>
          <div class="item">
            <?php echo htmlspecialchars($item['title']); ?>
            
            <form action="delete_item.php" method="POST" style="display:inline;">
              <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
              <button type="submit">X</button>
            </form>

            <?php if ($lane['id'] < 3) : ?>
              <form action="move_item.php" method="POST" style="display:inline;">
                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="lane_id" value="<?php echo $lane['id']; ?>">
                <button type="submit">
                  Naar <?php echo $lane['id'] == 1 ? 'In Progress' : 'Done'; ?>
                </button>
              </form>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>

        <form action="index.php" method="POST">
          <input type="text" name="title" placeholder="New item">
          <input type="hidden" name="lane_id" value="<?php echo $lane['id']; ?>">
          <button type="submit">Item toevoegen</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>

</body>
</html>
