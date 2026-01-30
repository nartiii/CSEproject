<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();
$rows = $pdo->query("select * from contact_messages order by created_at desc")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Contact Messages</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <main style="max-width: 1100px; margin: 0 auto; padding: 24px;">
    <h1>Contact Messages</h1>

    <div style="display:flex; gap:10px; margin: 14px 0;">
      <a href="dashboard.php" style="padding:10px 12px; border:1px solid #333; border-radius:8px; text-decoration:none;">← Dashboard</a>
    </div>

    <?php if (count($rows) === 0): ?>
      <p>No messages yet.</p>
    <?php else: ?>
      <table style="width:100%; border-collapse:collapse;">
        <thead>
          <tr>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Name</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Email</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Message</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Created By</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
            <tr>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["name"]); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["email"]); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["message"]); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["created_by"] ?? "-"); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($r["created_at"]); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>

</body>
</html>
