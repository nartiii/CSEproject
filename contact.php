<?php
require_once __DIR__ . "/app/Database.php";

$errors = [];
$sent = false;

$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["name"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $message = trim($_POST["message"] ?? "");

  // simple backend validation
  if (strlen($name) < 2) $errors[] = "Name must be at least 2 characters.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";
  if (strlen($message) < 10) $errors[] = "Message must be at least 10 characters.";

  if (count($errors) === 0) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare("insert into contact_messages (name, email, message) values (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    $sent = true;
    $name = $email = $message = "";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CourtLine | Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  
  <main style="max-width: 900px; margin: 0 auto; padding: 24px;">
    <h1>Contact Us</h1>

    <?php if ($sent): ?>
      <p style="padding:10px;border:1px solid #1f4020;background:#071207;border-radius:6px;">
        ✅ Message sent and saved in database.
      </p>
    <?php endif; ?>

    <?php if (count($errors) > 0): ?>
      <div style="padding:10px;border:1px solid #402020;background:#120707;border-radius:6px;">
        <strong>Fix these:</strong>
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form id="contactForm" method="post" action="contact.php" style="display:flex;flex-direction:column;gap:12px;margin-top:14px;">
      <input type="text" name="name" placeholder="Your name" value="<?php echo htmlspecialchars($name); ?>">
      <input type="email" name="email" placeholder="Your email" value="<?php echo htmlspecialchars($email); ?>">
      <textarea name="message" rows="6" placeholder="Your message"><?php echo htmlspecialchars($message); ?></textarea>
      <button type="submit">Send</button>
    </form>
  </main>

 

  <script src="main.js"></script>
</body>
</html>
