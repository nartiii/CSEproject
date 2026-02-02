<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

$user = Auth::user();

$errors = [];
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"] ?? "");
  $password = $_POST["password"] ?? "";

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";
  if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";

  if (count($errors) === 0) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare("select * from users where email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch();

    if (!$row || !password_verify($password, $row["password_hash"])) {
      $errors[] = "Wrong email or password.";
    } else {
      Auth::login($row);
      header("Location: " . ($row["role"] === "admin" ? "admin/dashboard.php" : "index.php"));
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | Login</title>
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
      <h1>Login</h1>
      <p class="form-subtitle">Welcome back — enter your details to continue.</p>

      <?php if (count($errors) > 0): ?>
        <div class="alert alert-error">
          <ul>
            <?php foreach ($errors as $e): ?>
              <li><?php echo htmlspecialchars($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form id="loginForm" class="form" method="post" action="login.php">
        <input type="email" name="email" id="loginEmail" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
        <input type="password" name="password" id="loginPassword" placeholder="Password">
        <p id="loginError" class="form-error"></p>
        <button type="submit" class="btn-main form-btn">Login</button>
      </form>

      <p class="form-bottom">
        Don’t have an account? <a href="register.php">Register</a>
      </p>
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 CourtLine. All rights reserved.</p>
  </footer>

   <script src="assets/main.js"></script>
</body>
</html>
