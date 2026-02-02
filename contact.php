<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

$user = Auth::user();

$errors = [];
$sent = false;

$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["name"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $message = trim($_POST["message"] ?? "");

  if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";
  if (strlen($message) < 10) $errors[] = "Message must be at least 10 characters.";

  if (count($errors) === 0) {
    $pdo = Database::connect();
    $createdBy = $user ? $user["name"] : null;

    $stmt = $pdo->prepare("insert into contact_messages (name, email, message, created_by) values (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $message, $createdBy]);

    $sent = true;
    $name = $email = $message = "";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | Contact</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
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
      <a href="products.php">Ptroducts</a>
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

  <main class="form-page">
    <div class="form-card">
      <h1>Contact Us</h1>
      <p class="form-subtitle">Have a question? Send us a message and we’ll get back to you.</p>

      <?php if ($sent): ?>
        <div class="alert alert-success">✅ Message sent.</div>
      <?php endif; ?>

      <?php if (count($errors) > 0): ?>
        <div class="alert alert-error">
          <ul>
            <?php foreach ($errors as $e): ?>
              <li><?php echo htmlspecialchars($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form id="contactForm" class="form" method="post" action="contact.php">
        <input id="contactName" type="text" name="name" placeholder="Your name" value="<?php echo htmlspecialchars($name); ?>">
        <input id="contactEmail" type="email" name="email" placeholder="Your email" value="<?php echo htmlspecialchars($email); ?>">
        <textarea id="contactMessage" name="message" rows="6" placeholder="Your message"><?php echo htmlspecialchars($message); ?></textarea>
        <p id="contactError" class="form-error"></p>
        <button type="submit" class="btn-main form-btn">Send</button>
      </form>
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

 <script src="assets/main.js"></script>
</body>
</html>
