<?php
require_once __DIR__ . "/app/Auth.php";
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Content.php";

$user = Auth::user();

$pdo = Database::connect(); 

$content = Content::getMany($pdo, [
  "about_title",
  "about_text",
  "about_card1_title",
  "about_card1_text",
  "about_card2_title",
  "about_card2_text",
  "about_card3_title",
  "about_card3_text"
]);

$aboutTitle = $content["about_title"] ?? "About";
$aboutText  = $content["about_text"] ?? "";

$c1t = $content["about_card1_title"] ?? "";
$c1p = $content["about_card1_text"] ?? "";

$c2t = $content["about_card2_title"] ?? "";
$c2p = $content["about_card2_text"] ?? "";

$c3t = $content["about_card3_title"] ?? "";
$c3p = $content["about_card3_text"] ?? "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | About Us</title>
  <link rel="stylesheet" href="assets/style.css">
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
      <a href="products.php">Products</a>
      <a href="football.php">Football</a>
    </div>

    <div class="nav-logo">
      <a href="index.php">CourtLine<span>.</span></a>
    </div>

    <div class="nav-right">
  <a href="about.php" class="nav-link-light">About</a>
  <a href="contact.php" class="nav-link-light">Contact</a>

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

  <main class="page-wrap">
  <section class="page-hero">
    <h1><?php echo htmlspecialchars($aboutTitle); ?></h1>
    <p><?php echo htmlspecialchars($aboutText); ?></p>
  </section>

  <section class="page-card">
    <h2><?php echo htmlspecialchars($c1t); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($c1p)); ?></p>
  </section>

  <section class="page-card">
    <h2><?php echo htmlspecialchars($c2t); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($c2p)); ?></p>
  </section>

  <section class="page-card">
    <h2><?php echo htmlspecialchars($c3t); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($c3p)); ?></p>
  </section>
</main>


  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

 <script src="assets/main.js"></script>
</body>
</html>
