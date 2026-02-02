<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/../app/Auth.php";

$user = Auth::user();
$pdo = Database::connect();

$id = (int)($_GET["id"] ?? 0);

$stmt = $pdo->prepare("select * from home_slides where id = ?");
$stmt->execute([$id]);
$s = $stmt->fetch();

if (!$s) {
  echo "Not found";
  exit;
}

$errors = [];
$title = $s["title"];
$subtitle = $s["subtitle"];
$image_url = $s["image_url"];
$button_text = $s["button_text"];
$button_link = $s["button_link"];
$sort_order = (int)$s["sort_order"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = trim($_POST["title"] ?? "");
  $subtitle = trim($_POST["subtitle"] ?? "");
  $image_url = trim($_POST["image_url"] ?? "");
  $button_text = trim($_POST["button_text"] ?? "");
  $button_link = trim($_POST["button_link"] ?? "");
  $sort_order = (int)($_POST["sort_order"] ?? 1);

  if (strlen($title) < 2) $errors[] = "Title too short.";
  if (strlen($subtitle) < 2) $errors[] = "Subtitle too short.";
  if (strlen($image_url) < 5) $errors[] = "Image URL required.";
  if (strlen($button_text) < 1) $errors[] = "Button text required.";
  if (strlen($button_link) < 1) $errors[] = "Button link required.";

  if (!$errors) {
    $upd = $pdo->prepare("update home_slides set title=?, subtitle=?, image_url=?, button_text=?, button_link=?, sort_order=?, updated_by=? where id=?");
    $upd->execute([$title, $subtitle, $image_url, $button_text, $button_link, $sort_order, $user["name"] ?? null, $id]);
    header("Location: slides_list.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Edit Slide</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <main style="max-width:900px;margin:0 auto;padding:24px;">
    <h1>Edit Slide</h1>

    <?php if ($errors): ?>
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form method="post" action="" style="display:flex;flex-direction:column;gap:12px;margin-top:12px;">
      <input name="title" value="<?php echo htmlspecialchars($title); ?>">
      <input name="subtitle" value="<?php echo htmlspecialchars($subtitle); ?>">
      <input name="image_url" value="<?php echo htmlspecialchars($image_url); ?>">
      <input name="button_text" value="<?php echo htmlspecialchars($button_text); ?>">
      <input name="button_link" value="<?php echo htmlspecialchars($button_link); ?>">
      <input type="number" name="sort_order" value="<?php echo (int)$sort_order; ?>">
      <button type="submit">Update</button>
    </form>

    <p style="margin-top:14px;"><a href="slides_list.php">Back</a></p>
  </main>
</body>
</html>
