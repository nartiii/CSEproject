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
  <title>CourtLine | Men</title>
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
    <h1 class="catalog-title">MEN</h1>
    <p class="catalog-subtitle">Sneakers, tracksuits and training gear.</p>

    <section class="catalog-grid">

    
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/IH2063-201.webp?v=1763486948">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">AIR MAX 90</h3>
          <p class="catalog-price">167.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>41</span><span>43</span><span>44</span><span>45</span>
          </div>
        </div>
      </article>

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
          <img src="https://sportas.shop/pr_im/JP7773.webp?v=1763486411">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW</p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">ADIDAS LIGHTBLAZE</h3>
          <p class="catalog-price">110.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>40</span><span>41</span><span>42</span><span>43</span><span>44</span>
          </div>
        </div>
      </article>

             <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/JS3807.webp?v=1763486897">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">ADIDAS</p>
          <h3 class="catalog-name">CAMPUS</h3>
          <p class="catalog-price">90.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>42</span>
          </div>
        </div>
      </article>

        
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/3MF30243318.webp?v=1763488419">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">ON</p>
          <h3 class="catalog-name"> Cloudsurfer Trail 2</h3>
          <p class="catalog-price">190.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>41</span><span>42</span><span>42.5</span><span>46</span>
          </div>
        </div>
      </article>
     
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/HV1444-010.webp?v=1763489034">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">Track Suit</h3>
          <p class="catalog-price">100.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>S</span>
          </div>
        </div>
      </article>


  
      <article class="catalog-card">
        <div class="catalog-img-wrap">
          <img src="https://sportas.shop/pr_im/HJ2146-400.webp?v=1763490019">
        </div>
        <div class="catalog-body">
          <p class="catalog-tag">NEW </p>
          <p class="catalog-brand">NIKE</p>
          <h3 class="catalog-name">PHANTOM 360 ELITE</h3>
          <p class="catalog-price">292.00 €</p>

          <p class="catalog-sizes-label">Available sizes:</p>
          <div class="catalog-sizes">
            <span>42</span><span>43</span><span>44</span><span>44.5</span>
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
