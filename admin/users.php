<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();

$users = $pdo->query("select id, name, email, role, created_at from users order by created_at desc")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<main style="max-width:1100px;margin:0 auto;padding:24px;">
  <h1>Users</h1>

  <div style="display:flex;gap:12px;flex-wrap:wrap;margin:14px 0;">
    <a href="dashboard.php" style="display:inline-block;padding:10px 14px;border:1px solid #222;border-radius:10px;background:#fff;color:#111;text-decoration:none;font-weight:600;">Dashboard</a>
    <a href="../index.php" style="display:inline-block;padding:10px 14px;border:1px solid #222;border-radius:10px;background:#fff;color:#111;text-decoration:none;font-weight:600;">Back to Website</a>
  </div>

  <table style="width:100%;border-collapse:collapse;">
    <thead>
      <tr>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">ID</th>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Name</th>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Email</th>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Role</th>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Created</th>
        <th style="text-align:left;padding:10px;border-bottom:1px solid #333;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $u): ?>
        <tr>
          <td style="padding:10px;border-bottom:1px solid #222;"><?php echo (int)$u["id"]; ?></td>
          <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($u["name"]); ?></td>
          <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($u["email"]); ?></td>
          <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($u["role"]); ?></td>
          <td style="padding:10px;border-bottom:1px solid #222;"><?php echo htmlspecialchars($u["created_at"]); ?></td>
          <td style="padding:10px;border-bottom:1px solid #222;">
            <?php if ($u["role"] === "admin"): ?>
              <a href="users_update_role.php?id=<?php echo (int)$u["id"]; ?>&role=user"
                 onclick="return confirm('Make this user a normal user?');">
                Make user
              </a>
            <?php else: ?>
              <a href="users_update_role.php?id=<?php echo (int)$u["id"]; ?>&role=admin"
                 onclick="return confirm('Make this user an admin?');">
                Make admin
              </a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</main>

</body>
</html>
