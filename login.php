<?php
require_once __DIR__ . "/app/Database.php";
require_once __DIR__ . "/app/Auth.php";

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
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user["password_hash"])) {
      $errors[] = "Wrong email or password.";
    } else {
      Auth::login($user);

      if ($user["role"] === "admin") {
        header("Location: admin/dashboard.php");
      } else {
        header("Location: index.php");
      }
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
  <link rel="stylesheet" href="login.css">
</head>
<body>

  <main style="max-width: 520px; margin: 0 auto; padding: 24px;">
    <h1>Login</h1>

    <?php if (count($errors) > 0): ?>
      <div style="padding:10px;border:1px solid #402020;background:#120707;border-radius:6px;">
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form id="loginForm" method="post" action="login.php" style="display:flex;flex-direction:column;gap:12px;margin-top:14px;">
      <input type="email" name="email" id="loginEmail" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
      <input type="password" name="password" id="loginPassword" placeholder="Password">
      <p id="loginError"></p>
      <button type="submit">Login</button>
    </form>

    <p style="margin-top:12px;">
      Don’t have an account? <a href="register.php">Register</a>
    </p>
  </main>

  <script src="main.js"></script>
</body>
</html>
