<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

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
  <link rel="stylesheet" href="register.css">
</head>
<body>

  <main style="max-width: 520px; margin: 0 auto; padding: 24px;">
    <h1>Create account</h1>

    <?php if ($ok): ?>
      <p style="padding:10px;border:1px solid #1f4020;background:#071207;border-radius:6px;">
        ✅ Registered successfully. You can now <a href="login.php">login</a>.
      </p>
    <?php endif; ?>

    <?php if (count($errors) > 0): ?>
      <div style="padding:10px;border:1px solid #402020;background:#120707;border-radius:6px;">
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form id="registerForm" method="post" action="register.php" style="display:flex;flex-direction:column;gap:12px;margin-top:14px;">
      <input type="text" name="name" id="registerUsername" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>">
      <input type="email" name="email" id="registerEmail" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
      <input type="password" name="password" id="registerPassword" placeholder="Password">
      <input type="password" name="confirm_password" id="registerConfirmPassword" placeholder="Confirm Password">
      <p id="registerError"></p>
      <button type="submit">Register</button>
    </form>

    <p style="margin-top:12px;">
      Already have an account? <a href="login.php">Login</a>
    </p>
  </main>

  <script src="main.js"></script>
</body>
</html>
