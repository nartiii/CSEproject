<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();

$messages = $pdo->query("select * from contact_messages order by created_at desc")->fetchAll();
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

  <main style="max-width:1100px;margin:0 auto;padding:24px;">
    <h1>Contact Messages</h1>

    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:14px 0;">
      <a href="dashboard.php" style="display:inline-block;padding:10px 14px;border:1px solid #222;border-radius:10px;background:#fff;color:#111;text-decoration:none;font-weight:600;">Dashboard</a>
      <a href="../contact.php" style="display:inline-block;padding:10px 14px;border:1px solid #222;border-radius:10px;background:#fff;color:#111;text-decoration:none;font-weight:600;">Open Contact Page</a>
    </div>

    <table style="width:100%;border-collapse:collapse;">
      <thead>
        <tr>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Date</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Name</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Email</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Message</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Created by</th>
          <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($messages as $m): ?>
          <tr>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <?php echo htmlspecialchars($m["created_at"] ?? ""); ?>
            </td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <?php echo htmlspecialchars($m["name"] ?? ""); ?>
            </td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <?php echo htmlspecialchars($m["email"] ?? ""); ?>
            </td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <?php echo nl2br(htmlspecialchars($m["message"] ?? "")); ?>
            </td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <?php echo htmlspecialchars($m["created_by"] ?? ""); ?>
            </td>
            <td style="padding:10px;border-bottom:1px solid #222;">
              <a href="messages_delete.php?id=<?php echo (int)$m["id"]; ?>" onclick="return confirm('Delete this message?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php if (count($messages) === 0): ?>
      <p>No messages yet.</p>
    <?php endif; ?>
  </main>

</body>
</html>
