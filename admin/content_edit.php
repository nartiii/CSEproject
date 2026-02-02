<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/../app/Auth.php";
require_once __DIR__ . "/../app/Content.php";

$user = Auth::user();
$pdo = Database::connect();

$keys = [
  "home_hero_title",
  "home_hero_subtitle",
  "home_section_1_title",
  "home_section_1_text",
  "about_title",
  "about_text"
];

$saved = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($keys as $k) {
    $val = trim($_POST[$k] ?? "");

    $stmt = $pdo->prepare("
      insert into content_blocks (content_key, content_value, updated_by)
      values (?, ?, ?)
      on duplicate key update content_value = values(content_value), updated_by = values(updated_by)
    ");
    $stmt->execute([$k, $val, $user["name"] ?? null]);
  }
  $saved = true;
}

$content = Content::getMany($pdo, $keys);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Edit Content</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <main style="max-width:900px;margin:0 auto;padding:24px;">
    <h1>Edit Home + About Content</h1>

    <?php if ($saved): ?>
      <p>Saved.</p>
    <?php endif; ?>

    <form method="post" style="display:flex;flex-direction:column;gap:12px;margin-top:12px;">
      <label>Home hero title</label>
      <input name="home_hero_title" value="<?php echo htmlspecialchars($content["home_hero_title"] ?? ""); ?>">

      <label>Home hero subtitle</label>
      <textarea name="home_hero_subtitle" rows="3"><?php echo htmlspecialchars($content["home_hero_subtitle"] ?? ""); ?></textarea>

      <label>Home section 1 title</label>
      <input name="home_section_1_title" value="<?php echo htmlspecialchars($content["home_section_1_title"] ?? ""); ?>">

      <label>Home section 1 text</label>
      <textarea name="home_section_1_text" rows="3"><?php echo htmlspecialchars($content["home_section_1_text"] ?? ""); ?></textarea>

      <label>About title</label>
      <input name="about_title" value="<?php echo htmlspecialchars($content["about_title"] ?? ""); ?>">

      <label>About text</label>
      <textarea name="about_text" rows="4"><?php echo htmlspecialchars($content["about_text"] ?? ""); ?></textarea>

      <button type="submit">Save</button>
    </form>

    <p style="margin-top:14px;"><a href="dashboard.php">Back to dashboard</a></p>
  </main>
</body>
</html>
