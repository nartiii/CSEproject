<?php
require_once __DIR__ . "/app/Auth.php";
$user = Auth::user();
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Content.php";

$pdo = Database::connect();

$home = Content::getMany($pdo, [
  "home_section_1_title",
  "home_section_1_text"
]);

$homeSectionTitle = $home["home_section_1_title"] ?? "";
$homeSectionText  = $home["home_section_1_text"] ?? "";

$slides = $pdo->query("select * from home_slides order by sort_order asc")->fetchAll();

$newCollection = $pdo->query("select id, title, price, image_path from products order by created_at desc limit 8")->fetchAll();



?>
    
    
    <!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>CourtLine | The Heart of Sportswear</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div class="top-bar">
    <p>Free shipping on orders over 50€</p>
  </div>

  
  <header class="header">
    <div class="nav-left">
      <a href="men.html">Men</a>
      <a href="women.html">Women</a>
      <a href="kids.html">Kids</a>
      <a href="products.php">Products</a>
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

  <section class="category-strip">
  <a href="clothes.html">Clothes</a>
  <a href="sneakers.html">Sneakers</a>
  <a href="accessories.html">Accessories</a>
    <a href="gallery.php">Gallery</a>
  </section>

  <main>

    
    <section class="hero-slider">
  <div class="slider-container">

    <?php foreach ($slides as $i => $s): ?>
      <div class="slide <?php echo $i === 0 ? 'active' : ''; ?>">
        <div class="slide-bg" style="background-image:url('<?php echo htmlspecialchars($s["image_url"]); ?>');"></div>
        <div class="slide-content">
          <h1><?php echo htmlspecialchars($s["title"]); ?></h1>
          <p><?php echo htmlspecialchars($s["subtitle"]); ?></p>
          <a href="<?php echo htmlspecialchars($s["button_link"]); ?>" class="btn-main">
            <?php echo htmlspecialchars($s["button_text"]); ?>
          </a>
        </div>
      </div>
    <?php endforeach; ?>

    <button class="slider-btn prev">&#10094;</button>
    <button class="slider-btn next">&#10095;</button>

    <div class="slider-dots">
      <?php foreach ($slides as $i => $_): ?>
        <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>"></span>
      <?php endforeach; ?>
    </div>

  </div>
</section>



    <section class="categories">
      <h2>Shop by Category</h2>
      <div class="categories-grid">
        <a href="men.html" class="category-card">
          <div class="category-label">MEN</div>
          <p>Sneakers, tracksuits and training gear.</p>
        </a>

        <a href="women.html" class="category-card">
          <div class="category-label">WOMEN</div>
          <p>Streetwear and performance fits.</p>
        </a>

        <a href="kids.html" class="category-card">
          <div class="category-label">KIDS</div>
          <p>Mini sizes, full style.</p>
        </a>
      </div>
    </section>

    <section class="featured">
 <h2><?php echo htmlspecialchars($homeSectionTitle); ?></h2>
<p style="max-width:720px;margin:8px 0 18px;opacity:.85;">
  <?php echo htmlspecialchars($homeSectionText); ?>
</p>


  <div class="products-grid grid-4">

    <?php foreach ($newCollection as $p): ?>
      <div class="product-card">
        <img src="<?php echo htmlspecialchars($p["image_path"] ?? ""); ?>" class="product-image">
        <h3><?php echo htmlspecialchars($p["title"] ?? ""); ?></h3>
        <span class="price"><?php echo number_format((float)($p["price"] ?? 0), 2); ?>€</span>
        <a href="product_detail.php?id=<?php echo (int)$p["id"]; ?>" class="btn-secondary">View Details</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>


    
    <section class="featured">  
      <h2>Staff Picks</h2>
      <div class="products-grid">
        <div class="product-card">
          <img src="images/runner2.jpg" class="product-image">
          <h3>ADIDAS Handball Special</h3>
          <p>Iconic shoes that combine style and functionality with a rubber outsole.
          <span class="price">89.99€</span>
          <a href="" class="btn-secondary">View Details</a>
        </div>

        <div class="product-card">
          <img src="images/runner1.jpg" class="product-image">
          <h3>Air Jordan 11 Retro 'Pearl
          <p>A silhouette that flips the script. The Air Jordan 11 'Pearl' features pearlescent details and a leather upper that nod to timeless traditions and raise the stakes with new energy. 
          <span class="price">119.99€</span>
          <a href="" class="btn-secondary">View Details</a>
        </div>

        <div class="product-card">
          <img src="images/runner3.jpg" class="product-image">
          <h3>Nike T90 Collection
          <p>From cage battles to top bins in the Prem, Nike’s T90 wasn’t just a boot—it was the era. And now? It’s back.
        <br>
          <a href="" class="btn-secondary">View Details</a>
        </div>
      </div>
    </section>

   
    <section class="banner">
      <p>Become a CourtLine member and get <strong>10% off</strong> your first order.</p>
      <a href="register.php" class="btn-main">Join CourtLine</a>
    </section>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

  <script src="main.js"></script>
</body>
</html>
