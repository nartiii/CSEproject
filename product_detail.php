<?php
require_once __DIR__ . "/app/Auth.php";
require_once __DIR__ . "/app/Database.php";

$user = Auth::user();
$pdo = Database::connect();

$id = (int)($_GET["id"] ?? 0);
if ($id <= 0) {
  header("Location: products.php");
  exit;
}

$stmt = $pdo->prepare("select * from products where id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
  header("Location: products.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($product["title"] ?? "Product"); ?> | CourtLine</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

  <div class="top-bar">
    <p>Free shipping on orders over 50€</p>
  </div>

  <header class="header">
    <div class="nav-left">
      <a href="men.php">Men</a>
      <a href="women.php">Women</a>
      <a href="kids.php">Kids</a>
      <a href="products.php">New</a>
      <a href="football.php">Football</a>
    </div>

    <div class="nav-logo">
      <a href="index.php">CourtLine<span>.</span></a>
    </div>

    <div class="nav-right">
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>

      <form class="search-form">
        <input type="text" placeholder="Search" />
      </form>

      <?php if ($user): ?>
        <?php if (($user["role"] ?? "") === "admin"): ?>
          <a href="admin/dashboard.php" class="nav-link-light">Dashboard</a>
        <?php endif; ?>
        <span class="nav-link-light">Hi, <?php echo htmlspecialchars($user["name"]); ?></span>
        <a href="logout.php" class="btn-nav">Logout</a>
      <?php else: ?>
        <a href="login.php" class="nav-link-light">Login</a>
        <a href="register.php" class="btn-nav">Sign Up</a>
      <?php endif; ?>
    </div>
  </header>

  <section class="category-strip">
    <a href="clothes.php">Clothes</a>
    <a href="sneakers.php">Sneakers</a>
    <a href="accessories.php">Accessories</a>
    <a href="gallery.php">Gallery</a>
  </section>

  <main style="max-width:1100px;margin:0 auto;padding:24px;">

    <a href="index.php" class="btn-secondary" style="display:inline-block;margin-bottom:14px;">
      ← Back to Home
    </a>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:start;">
      <div style="border:1px solid #222;border-radius:14px;overflow:hidden;background:#111;">
        <img
          src="<?php echo htmlspecialchars($product["image_path"] ?? ""); ?>"
          alt="<?php echo htmlspecialchars($product["title"] ?? ""); ?>"
          style="width:100%;height:520px;object-fit:cover;display:block;"
        >
      </div>

      <div style="border:1px solid #222;border-radius:14px;padding:18px;background:#0f0f0f;">
        <h1 style="margin:0 0 10px;"><?php echo htmlspecialchars($product["title"] ?? ""); ?></h1>

        <p style="margin:0 0 14px;font-size:18px;">
          <strong><?php echo number_format((float)($product["price"] ?? 0), 2); ?>€</strong>
        </p>

        <?php if (!empty($product["description"])): ?>
          <p style="opacity:.85;line-height:1.6;">
            <?php echo nl2br(htmlspecialchars($product["description"])); ?>
          </p>
        <?php else: ?>
          <p style="opacity:.75;line-height:1.6;">
            Clean design. Premium feel. Made for sport and street.
          </p>
        <?php endif; ?>

        <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap;">
          <a href="products.php" class="btn-secondary">More Products</a>
          <?php if (($user["role"] ?? "") === "admin"): ?>
            <a href="admin/products_edit.php?id=<?php echo (int)$product["id"]; ?>" class="btn-secondary">Edit (Admin)</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

</body>
</html>
