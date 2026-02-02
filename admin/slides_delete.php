<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$id = (int)($_GET["id"] ?? 0);

$pdo = Database::connect();
$stmt = $pdo->prepare("delete from home_slides where id = ?");
$stmt->execute([$id]);

header("Location: slides_list.php");
exit;
