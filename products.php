<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

$user = Auth::user();

$pdo = Database::connect();
$products = $pdo->query("select * from products order by created_at desc")->fetchAll();
?>


<!DOCTYPE html>


<head>
  <meta charset="UTF-8">
  <title>CourtLine | New Arrivals</title>
  <link rel="stylesheet" href="main.css">
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
      <form class="search-form">
        <input type="text" placeholder="Search">
      </form>
      <a href="login.php" class="nav-link-light">Login</a>
      <a href="register.php" class="btn-nav">Sign Up</a>
    </div>
  </header>

  <section class="category-strip">
  <a href="clothes.php">Clothes</a>
  <a href="sneakers.php">Sneakers</a>
  <a href="accessories.php">Accessories</a>
    <a href="gallery.php">Gallery</a>
  </section>

  <main class="catalog-page">
    <h1 class="catalog-title">New Arrivals</h1>
    <p class="catalog-subtitle">Fresh drops and the latest fits just added to the store.</p>

<section class="catalog-grid">

  <?php foreach ($products as $p): ?>
    <article class="catalog-card">
      <div class="catalog-img-wrap">
        <img src="<?php echo htmlspecialchars($p['image_path']); ?>" alt="">
      </div>

      <div class="catalog-body">
        <p class="catalog-tag">NEW</p>
        <p class="catalog-brand"><?php echo htmlspecialchars($p['category']); ?></p>

        <h3 class="catalog-name"><?php echo htmlspecialchars($p['title']); ?></h3>

        <p class="catalog-price">
          <?php echo number_format((float)$p['price'], 2); ?> €
        </p>
<a href="product_detail.php?id=<?php echo (int)$p["id"]; ?>" class="btn-secondary">View Details</a>

          <?php
$sizesRaw = trim($p["sizes"] ?? "");
$sizes = $sizesRaw !== "" ? array_map("trim", explode(",", $sizesRaw)) : [];
?>

<?php if (!empty($sizes)): ?>
  <p class="catalog-sizes-label">Available sizes:</p>
  <div class="catalog-sizes">
    <?php foreach ($sizes as $sz): ?>
      <span><?php echo htmlspecialchars($sz); ?></span>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

      </div>
    </article>
  <?php endforeach; ?>

</section>

  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

  <script src="main.js"></script>
</body>
</html>
