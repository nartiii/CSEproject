<?php
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/guard.php";
$pdo = Database::connect();
$products = $pdo->query("select * from products order by created_at desc")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <main style="max-width: 1100px; margin: 0 auto; padding: 24px;">
    <h1>Manage Products</h1>

    <div style="display:flex; gap:10px; margin: 14px 0;">
      <a href="dashboard.php" style="padding:10px 12px; border:1px solid #333; border-radius:8px; text-decoration:none;">← Dashboard</a>
      <a href="products_create.php" style="padding:10px 12px; border:1px solid #333; border-radius:8px; text-decoration:none;">+ Add Product</a>
    </div>

    <?php if (count($products) === 0): ?>
      <p>No products yet.</p>
    <?php else: ?>
      <table style="width:100%; border-collapse:collapse; margin-top: 10px;">
        <thead>
          <tr>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">ID</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Title</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Category</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Price</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Image</th>
            <th style="text-align:left; padding:10px; border-bottom:1px solid #333;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $p): ?>
            <tr>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo (int)$p["id"]; ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($p["title"]); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo htmlspecialchars($p["category"]); ?></td>
              <td style="padding:10px; border-bottom:1px solid #222;"><?php echo number_format((float)$p["price"], 2); ?> €</td>
              <td style="padding:10px; border-bottom:1px solid #222;">
                <?php if (!empty($p["image_path"])): ?>
                  <a href="<?php echo htmlspecialchars($p["image_path"]); ?>" target="_blank">View</a>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
              <td style="padding:10px; border-bottom:1px solid #222;">
                <a href="products_edit.php?id=<?php echo (int)$p["id"]; ?>">Edit</a>
                |
                <a href="products_delete.php?id=<?php echo (int)$p["id"]; ?>" onclick="return confirm('Delete this product?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>

</body>
</html>
