<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/../app/Auth.php";

$user = Auth::user();

$title = "";
$description = "";
$media_url = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = trim($_POST["title"] ?? "");
  $description = trim($_POST["description"] ?? "");
  $media_url = trim($_POST["media_url"] ?? "");

  if (strlen($title) < 2) $errors[] = "Title too short.";
  if (strlen($description) < 5) $errors[] = "Description too short.";
  if (strlen($media_url) < 5) $errors[] = "Media URL too short.";

  if (!$errors) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare("insert into gallery_items (title, description, media_url, created_by) values (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $media_url, $user["name"] ?? null]);
    header("Location: gallery_list.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Add Gallery Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../gallery.css">
</head>
<body>
  <main style="max-width:800px;margin:0 auto;padding:24px;">
    <h1>Add Gallery Item</h1>

    <?php if ($errors): ?>
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form method="post" style="display:flex;flex-direction:column;gap:12px;margin-top:12px;">
      <input name="title" placeholder="Title" value="<?php echo htmlspecialchars($title); ?>">
      <textarea name="description" rows="5" placeholder="Description"><?php echo htmlspecialchars($description); ?></textarea>
      <input name="media_url" placeholder="Image URL or images/file.jpg" value="<?php echo htmlspecialchars($media_url); ?>">
      <button type="submit">Save</button>
    </form>

    <p style="margin-top:14px;"><a href="gallery_list.php">Back</a></p>
  </main>
</body>
</html>
