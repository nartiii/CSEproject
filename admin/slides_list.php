<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();
$slides = $pdo->query("select * from home_slides order by sort_order asc")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Home Slides</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <main style="max-width:1100px;margin:0 auto;padding:24px;">
    <h1>Home Slider</h1>

    <div style="display:flex;gap:10px;margin:14px 0;">
      <a href="dashboard.php">Dashboard</a>
      <a href="slides_create.php">+ Add Slide</a>
    </div>

    <table style="width:100%;border-collapse:collapse;">
      <thead>
        <tr>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Order</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Title</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Link</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($slides as $s): ?>
          <tr>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo (int)$s["sort_order"]; ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($s["title"]); ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($s["button_link"]); ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <a href="slides_edit.php?id=<?php echo (int)$s["id"]; ?>">Edit</a>
              |
              <a href="slides_delete.php?id=<?php echo (int)$s["id"]; ?>" onclick="return confirm('Delete this slide?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
