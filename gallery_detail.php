<?php
require_once __DIR__ . "/app/Database.php";

$id = (int)($_GET["id"] ?? 0);

$pdo = Database::connect();
$stmt = $pdo->prepare("select * from gallery_items where id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
  http_response_code(404);
  echo "Not found";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($item["title"]); ?> | CourtLine</title>
  <link rel="stylesheet" href="gallery.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <header class="header">
    <div class="nav-left">
      <a href="gallery.php">Back</a>
    </div>
    <div class="nav-logo">
      <a href="index.php">CourtLine<span>.</span></a>
    </div>
    <div class="nav-right"></div>
  </header>

  <main class="gallery-page">
    <div class="gallery-header">
      <h1><?php echo htmlspecialchars($item["title"]); ?></h1>
      <p><?php echo htmlspecialchars($item["description"]); ?></p>
      <p style="margin-top:8px; font-size:12px; color:#b0b0b0;">
        By: <?php echo htmlspecialchars($item["created_by"] ?? "-"); ?> • <?php echo htmlspecialchars($item["created_at"]); ?>
      </p>
    </div>

    <div style="max-width:1100px; margin:0 auto;">
      <img style="width:100%; border-radius:6px;" src="<?php echo htmlspecialchars($item["media_url"]); ?>" alt="">
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

</body>
</html>
