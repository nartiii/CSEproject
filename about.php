<?php
require_once __DIR__ . "/app/Auth.php";
$user = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | About Us</title>
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
      <a href="products.html">New</a>
      <a href="football.html">Football</a>
    </div>

    <div class="nav-logo">
      <a href="index.php">CourtLine<span>.</span></a>
    </div>

    <div class="nav-right">
      <form class="search-form">
        <input type="text" placeholder="Search" />
      </form>
      <a href="about.php" class="nav-link-light">About</a>
      <a href="contact.php" class="nav-link-light">Contact</a>
      <a href="login.html" class="nav-link-light">Login</a>
      <a href="register.html" class="btn-nav">Sign Up</a>
    </div>
  </header>

  <section class="category-strip">
    <a href="clothes.html">Clothes</a>
    <a href="sneakers.html">Sneakers</a>
    <a href="accessories.html">Accessories</a>
    <a href="gallery.html">Gallery</a>
  </section>

  <main class="page-wrap">
    <section class="page-hero">
      <h1>About CourtLine</h1>
      <p>The heart of sportswear — built for the court, the street, and everything in between.</p>
    </section>

    <section class="page-card">
      <h2>What we do</h2>
      <p>
        CourtLine is a sportswear store concept focused on clean design, easy browsing, and premium items.
        This project is built with HTML, CSS, JavaScript, and now extended with PHP + MySQL for Phase 2.
      </p>
    </section>

    <section class="page-card">
      <h2>Why CourtLine</h2>
      <p>
        Our goal is a fast and modern shopping experience with categories like Sneakers, Clothes,
        Accessories, and Football collections.
      </p>
    </section>

    <section class="page-card">
      <h2>Phase 2 (backend)</h2>
      <p>
        In this phase, pages will become dynamic and read content from the database. Admin will manage content
        through a dashboard, and contact messages will be stored and readable.
      </p>
    </section>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

  <script src="main.js"></script>
</body>
</html>
