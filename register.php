<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

$user = Auth::user();

$errors = [];
$ok = false;

$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["name"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $password = $_POST["password"] ?? "";
  $confirm = $_POST["confirm_password"] ?? "";

  if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";
  if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
  if ($password !== $confirm) $errors[] = "Passwords do not match.";

  if (count($errors) === 0) {
    $pdo = Database::connect();

    $check = $pdo->prepare("select id from users where email = ?");
    $check->execute([$email]);
    if ($check->fetch()) {
      $errors[] = "Email already exists.";
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare("insert into users (name, email, password_hash, role) values (?, ?, ?, 'user')");
      $stmt->execute([$name, $email, $hash]);

      $ok = true;
      $name = "";
      $email = "";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | Register</title>
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
      <a href="products.php">New</a>
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
      <h1>Create account</h1>
      <p class="form-subtitle">Join CourtLine for new drops and exclusive picks.</p>

      <?php if ($ok): ?>
        <div class="alert alert-success">
          ✅ Registered successfully. You can now <a href="login.php">login</a>.
        </div>
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

      <form id="registerForm" class="form" method="post" action="register.php">
        <input type="text" name="name" id="registerUsername" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="email" name="email" id="registerEmail" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="password" name="password" id="registerPassword" placeholder="Password">
        <input type="password" name="confirm_password" id="registerConfirmPassword" placeholder="Confirm Password">
        <p id="registerError" class="form-error"></p>
        <button type="submit" class="btn-main form-btn">Register</button>
      </form>

      <p class="form-bottom">
        Already have an account? <a href="login.php">Login</a>
      </p>
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

   <script src="assets/main.js"></script>
</body>
</html>
