<?php
require_once __DIR__ . "/app/Auth.php";
$user = Auth::user();
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Content.php";

$pdo = Database::connect();


?>


<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>CourtLine | Clothes</title>
  <link rel="stylesheet" href="assets/main.css">
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

  <section class="category-strip">
  <a href="clothes.php">Clothes</a>
  <a href="sneakers.php">Sneakers</a>
  <a href="accessories.php">Accessories</a>
    <a href="gallery.php">Gallery</a>
  </section>

  
  <main class="catalog-page">
    <h1 class="catalog-title">Clothes</h1>
    <p class="catalog-subtitle">Hoodies, jackets, tees and track pants for every game day.</p>

    <section class="catalog-grid">

      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/FB7368-010.webp?v=1763427168">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">Puffer Jacket</h3>
          <p class="catalog-price">230.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span><span>M</span><span>L</span><span>XL</span><span>2XL</span>
          </div>
        </div>
      </article>

      
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/IY6829.webp?v=1763427529" >
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">V-Neck Sweatshirt</h3>
          <p class="catalog-price">60.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>XS</span><span>S</span><span>M</span><span>XL</span>
          </div>
        </div>
      </article>

      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/95D945-001.webp?v=1763427864">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">JORDAN</p>
          <h3 class="catalog-name"> Customized Air T-Shirt</h3>
          <p class="catalog-price">25.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span><span>M</span><span>L</span><span>XL</span>
          </div>
        </div>
      </article>

      
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JM1804.webp?v=1763427712">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">Open-Hem Pants</h3>
          <p class="catalog-price">65.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>M</span><span>L</span><span>XL</span>
          </div>
        </div>
      </article>

     
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JX5080.webp?v=1763428087">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">SZN TEE</h3>
          <p class="catalog-price">30.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>M</span><span>L</span>
          </div>
        </div>
      </article>

      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/IM9793-010.webp?v=1763428234">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">JORDAN</p>
          <h3 class="catalog-name"> FLEECE PANTS</h3>
          <p class="catalog-price">67.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span><span>M</span><span>L</span><span>XL</span>
          </div>
        </div>
      </article>

   
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/FN2839-010.webp?v=1763428377">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">Bomber Jacket</h3>
          <p class="catalog-price">146.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span>
          </div>
        </div>
      </article>


       
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JJ3071.webp?v=1763428520">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">Graphics Tee</h3>
          <p class="catalog-price">28.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span><span>M</span><span>L</span><span>XL</span>
          </div>
        </div>
      </article>

    </section>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

   <script src="assets/main.js"></script>
</body>
</html>
