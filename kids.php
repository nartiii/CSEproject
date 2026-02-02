
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
  <title>CourtLine | Kids</title>
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
    <h1 class="catalog-title">Kids</h1>
    <p class="catalog-subtitle">Sneakers, tracksuits and training gear.</p>

    <section class="catalog-grid">

      
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
          <img src="https://sportas.shop/pr_im/DV5458-134.webp?v=1763486552" >
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">Court Borough Low</h3>
          <p class="catalog-price">50.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>22</span><span>24</span><span>25</span><span>27</span>
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

   

     
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/76N279-X5C.webp?v=1763491680">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name"> JOGGER SET</h3>
          <p class="catalog-price">55.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>2T</span><span>3T</span><span>4T</span><span>5T</span>
          </div>
        </div>
      </article>

      
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JQ7996.webp?v=1763491804">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name"> Grand Court </h3>
          <p class="catalog-price">33.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>22</span><span>23</span><span>25</span><span>26</span>
          </div>
        </div>
      </article>

       
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/NN1243-AAJ.webp?v=1763491848">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name"> Baby Set</h3>
          <p class="catalog-price">34.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>6-12</span><span>12+24</span>
          </div>
        </div>
      </article>


       
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/FJ2600-300.webp?v=1763491961">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name"> Phantom JR </h3>
          <p class="catalog-price">56.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>33</span><span>35</span><span>36.5</span><span>38.5</span>
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
