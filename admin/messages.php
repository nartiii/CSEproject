<?php
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/guard.php";

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

  <main style="max-width: 1000px; margin: 0 auto; padding: 24px;">
    <h1>Contact Messages</h1>

    <?php if (count($rows) === 0): ?>
      <p>No messages yet.</p>
    <?php else: ?>
      <table style="width:100%;border-collapse:collapse;">
        <thead>
          <tr>
            <th style="border-bottom:1px solid #333;text-align:left;padding:8px;">Name</th>
            <th style="border-bottom:1px solid #333;text-align:left;padding:8px;">Email</th>
            <th style="border-bottom:1px solid #333;text-align:left;padding:8px;">Message</th>
            <th style="border-bottom:1px solid #333;text-align:left;padding:8px;">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
            <tr>
              <td style="border-bottom:1px solid #222;padding:8px;"><?php echo htmlspecialchars($r["name"]); ?></td>
              <td style="border-bottom:1px solid #222;padding:8px;"><?php echo htmlspecialchars($r["email"]); ?></td>
              <td style="border-bottom:1px solid #222;padding:8px;"><?php echo htmlspecialchars($r["message"]); ?></td>
              <td style="border-bottom:1px solid #222;padding:8px;"><?php echo htmlspecialchars($r["created_at"]); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>

</body>
</html>
