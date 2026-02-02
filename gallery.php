<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

$user = Auth::user();

$pdo = Database::connect();
$items = $pdo->query("select * from gallery_items order by created_at desc")->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | Gallery</title>
  <link rel="stylesheet" href="gallery.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


  <div class="top-bar">
    <p>Free shipping on orders over 50€</p>
  </div>

  
  <header class="header">
    <div class="nav-left">
      <a href="clothes.html">Men</a>
      <a href="sneakers.html">Women</a>
      <a href="kids.html">Kids</a>
      <a href="products.php">New</a>
      <a href="football.html">Football</a>
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
  <?php if ($user["role"] === "admin"): ?>
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







  
 <main class="gallery-page">
    <div class="gallery-header">
      <h1>CourtLine Gallery</h1>
      <p>Explore our world through visuals from the court, the streets and the studio.</p>
    </div>


    <<section class="masonry-gallery">
      <?php foreach ($items as $it): ?>
        <a href="gallery_detail.php?id=<?php echo (int)$it["id"]; ?>">
          <img src="<?php echo htmlspecialchars($it["media_url"]); ?>" alt="<?php echo htmlspecialchars($it["title"]); ?>">
        </a>
      <?php endforeach; ?>
    </section>
  </main>



  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

</body>
</html>
