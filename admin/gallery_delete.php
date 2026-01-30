<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$id = (int)($_GET["id"] ?? 0);

$pdo = Database::connect();
$stmt = $pdo->prepare("delete from gallery_items where id = ?");
$stmt->execute([$id]);

header("Location: gallery_list.php");
exit;
