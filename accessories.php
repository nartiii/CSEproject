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
  <title>CourtLine | Accessories</title>
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
    <h1 class="catalog-title">Accessories</h1>
    <p class="catalog-subtitle">Running, lifestyle, court and everyday shoes.</p>

    <section class="catalog-grid">

    
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JD8030.webp?v=1763487180">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">Trionda</h3>
          <p class="catalog-price">150.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>5</span>
          </div>
        </div>
      </article>

      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/NF0A52TMD0L1.webp?v=1763487264" >
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">THE NORTH FACE</p>
          <h3 class="catalog-name">WaistBag</h3>
          <p class="catalog-price">35.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>OS</span>
          </div>
        </div>
      </article>

      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/IC1294.webp?v=1763487337">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">Socks</h3>
          <p class="catalog-price">10.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span><span>M</span><span>L</span><span>XL</span>
          </div>
        </div>
      </article>

 
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/HJ4186-070.webp?v=1763487391">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name"> BackPack</h3>
          <p class="catalog-price">39.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>OS</span>
          </div>
        </div>
      </article>

      
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/NF0A7WHNLK51.webp?v=1763487441">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">THE NORTH FACE</p>
          <h3 class="catalog-name">Bucket Hat</h3>
          <p class="catalog-price">40.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>40</span>
          </div>
        </div>
      </article>

             <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/N.000.0043.128.22.webp?v=1763487602">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">Graphic Water Bottle</h3>
          <p class="catalog-price">10.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>OS</span>
          </div>
        </div>
      </article>

       
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/800233214500.webp?v=1763487671">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">SPEEDO</p>
          <h3 class="catalog-name">Goggles </h3>
          <p class="catalog-price">28.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>OS</span>
          </div>
        </div>
      </article>


      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/WIE253M602-01.webp?v=1763487743">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">WINTERO</p>
          <h3 class="catalog-name">SKI HELMET</h3>
          <p class="catalog-price">59.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>M</span><span>L</span>
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
