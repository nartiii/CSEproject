<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/../app/Auth.php";

$user = Auth::user();
$pdo = Database::connect();

$id = (int)($_GET["id"] ?? 0);

$stmt = $pdo->prepare("select * from gallery_items where id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
  echo "Not found";
  exit;
}

$title = $item["title"];
$description = $item["description"];
$media_url = $item["media_url"];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = trim($_POST["title"] ?? "");
  $description = trim($_POST["description"] ?? "");
  $media_url = trim($_POST["media_url"] ?? "");

  if (strlen($title) < 2) $errors[] = "Title too short.";
  if (strlen($description) < 5) $errors[] = "Description too short.";
  if (strlen($media_url) < 5) $errors[] = "Media URL too short.";

  if (!$errors) {
    $upd = $pdo->prepare("update gallery_items set title = ?, description = ?, media_url = ?, created_by = ? where id = ?");
    $upd->execute([$title, $description, $media_url, $user["name"] ?? null, $id]);
    header("Location: gallery_list.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Edit Gallery Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../gallery.css">
</head>
<body>
  <main style="max-width:800px;margin:0 auto;padding:24px;">
    <h1>Edit Gallery Item</h1>

    <?php if ($errors): ?>
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form method="post" style="display:flex;flex-direction:column;gap:12px;margin-top:12px;">
      <input name="title" value="<?php echo htmlspecialchars($title); ?>">
      <textarea name="description" rows="5"><?php echo htmlspecialchars($description); ?></textarea>
      <input name="media_url" value="<?php echo htmlspecialchars($media_url); ?>">
      <button type="submit">Update</button>
    </form>

    <p style="margin-top:14px;"><a href="gallery_list.php">Back</a></p>
  </main>
</body>
</html>
