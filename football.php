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
      <h1 class="catalog-title">New Arrivals</h1>
      <p class="catalog-subtitle">Fresh drops and the latest fits just added to the store.</p>

      <section class="catalog-grid">

        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/JH7615.webp?v=1763557851">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW</p>
            <p class="catalog-brand">ADIDAS</p>
            <h3 class="catalog-name"> F50 ELITE  </h3>
            <p class="catalog-price">260.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>44</span><span>44.5</span><span>45</span>
            </div>
          </div>
        </article>

        
        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="images/jb.png" >
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW</p>
            <p class="catalog-brand">ADIDAS</p>
            <h3 class="catalog-name">Predator Elite</h3>
            <p class="catalog-price">290.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>41</span><span>42</span><span>44</span><span>45</span>
            </div>
          </div>
        </article>

        
        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/HJ2146-400.webp?v=1763557943">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW </p>
            <p class="catalog-brand">NIKE</p>
            <h3 class="catalog-name">Phantom Elite</h3>
            <p class="catalog-price">292.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>42</span><span>43</span><span>44</span><span>45</span>
            </div>
          </div>
        </article>

        
        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/FJ2559-400.webp?v=1763558424">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW</p>
            <p class="catalog-brand">NIKE</p>
            <h3 class="catalog-name">PHANTOM GX II ELITE</h3>
            <p class="catalog-price">281.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>44</span>
            </div>
          </div>
        </article>

        
        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/JH8847.webp?v=1763558498">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW</p>
            <p class="catalog-brand">ADIDAS</p>
            <h3 class="catalog-name">Predator Club</h3>
            <p class="catalog-price">60.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>42</span><span>42.5</span>
            </div>
          </div>
        </article>

        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/FQ1454-800.webp?v=1763558498">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW </p>
            <p class="catalog-brand">NIKE</p>
            <h3 class="catalog-name">SUPERFLY 10 ELITE</h3>
            <p class="catalog-price">302.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>41</span><span>43</span><span>43.5</span><span>44</span>
            </div>
          </div>
        </article>

       
        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/FD6723-300.webp?v=1763558603">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW </p>
            <p class="catalog-brand">NIKE</p>
            <h3 class="catalog-name">PHANTOM GX II ACADEMY</h3>
            <p class="catalog-price">90.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>46</span>
            </div>
          </div>
        </article>


        <article class="catalog-card">
          <div class="catalog-img-wrap">
            <img src="https://sportas.shop/pr_im/FQ1454-600.webp?v=1763558664">
          </div>
          <div class="catalog-body">
            <p class="catalog-tag">NEW </p>
            <p class="catalog-brand">NIKE</p>
            <h3 class="catalog-name">SUPERFLY 10 ELITE </h3>
            <p class="catalog-price">302.00 €</p>

            <p class="catalog-sizes-label">Available sizes:</p>
            <div class="catalog-sizes">
              <span>42</span><span>44</span><span>45</span><span>45.5</span>
            </div>
          </div>
        </article>

      </section>
    </main>

    <footer class="footer">
      <p>© 2025 CourtLine. All rights reserved.</p>
    </footer>

    <script src="main.js"></script>
  </body>
  </html>
