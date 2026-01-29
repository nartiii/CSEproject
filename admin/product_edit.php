<?php
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/guard.php";
$pdo = Database::connect();

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
$stmt = $pdo->prepare("select * from products where id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
  http_response_code(404);
  echo "Product not found.";
  exit;
}

$errors = [];
$saved = false;

$title = $product["title"];
$description = $product["description"];
$price = (string)$product["price"];
$category = $product["category"];
$image_path = $product["image_path"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = trim($_POST["title"] ?? "");
  $description = trim($_POST["description"] ?? "");
  $price = trim($_POST["price"] ?? "");
  $category = trim($_POST["category"] ?? "");
  $image_path = trim($_POST["image_path"] ?? "");

  if (strlen($title) < 2) $errors[] = "Title must be at least 2 characters.";
  if (strlen($description) < 5) $errors[] = "Description must be at least 5 characters.";
  if ($category === "") $errors[] = "Category is required.";
  if ($price === "" || !is_numeric($price) || (float)$price <= 0) $errors[] = "Price must be a number > 0.";

  if (count($errors) === 0) {
    $u = $pdo->prepare("
      update products
      set title = ?, description = ?, price = ?, category = ?, image_path = ?
      where id = ?
    ");
    $u->execute([$title, $description, (float)$price, $category, $image_path, $id]);
    $saved = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Edit Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <main style="max-width: 800px; margin: 0 auto; padding: 24px;">
    <h1>Edit Product #<?php echo (int)$id; ?></h1>

    <div style="display:flex; gap:10px; margin: 14px 0;">
      <a href="products_list.php" style="padding:10px 12px; border:1px solid #333; border-radius:8px; text-decoration:none;">← Back</a>
      <a href="dashboard.php" style="padding:10px 12px; border:1px solid #333; border-radius:8px; text-decoration:none;">Dashboard</a>
    </div>

    <?php if ($saved): ?>
      <p style="padding:10px;border:1px solid #1f4020;background:#071207;border-radius:6px;">
        ✅ Product updated successfully.
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

    <form method="post" action="products_edit.php?id=<?php echo (int)$id; ?>" style="display:flex;flex-direction:column;gap:12px;margin-top:14px;">
      <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" placeholder="Title">
      <textarea name="description" rows="5" placeholder="Description"><?php echo htmlspecialchars($description); ?></textarea>
      <input type="text" name="category" value="<?php echo htmlspecialchars($category); ?>" placeholder="Category">
      <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" placeholder="Price">
      <input type="text" name="image_path" value="<?php echo htmlspecialchars($image_path); ?>" placeholder="Image path/url">
      <button type="submit" style="padding:10px 12px; border:1px solid #333; border-radius:8px; cursor:pointer;">Save Changes</button>
    </form>
  </main>

</body>
</html>
