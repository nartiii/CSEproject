<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();
$rows = $pdo->query("select * from gallery_items order by created_at desc")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../gallery.css">
</head>
<body>
  <main style="max-width:1100px;margin:0 auto;padding:24px;">
    <h1>Gallery Items</h1>

    <div style="display:flex;gap:10px;margin:14px 0;">
      <a href="dashboard.php">Dashboard</a>
      <a href="gallery_create.php">+ Add New</a>
    </div>

    <table style="width:100%;border-collapse:collapse;">
      <thead>
        <tr>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Title</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Created By</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Date</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["title"]); ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["created_by"] ?? "-"); ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["created_at"]); ?></td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <a href="gallery_edit.php?id=<?php echo (int)$r["id"]; ?>">Edit</a>
              |
              <a href="gallery_delete.php?id=<?php echo (int)$r["id"]; ?>" onclick="return confirm('Delete this item?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
