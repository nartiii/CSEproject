<?php
require_once __DIR__ . "/../app/Database.php";
require_once __DIR__ . "/guard.php";
$pdo = Database::connect();
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$stmt = $pdo->prepare("delete from products where id = ?");
$stmt->execute([$id]);

header("Location: products_list.php");
exit;
