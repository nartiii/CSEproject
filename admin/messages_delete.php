<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();
$id = (int)($_GET["id"] ?? 0);

$stmt = $pdo->prepare("delete from contact_messages where id = ?");
$stmt->execute([$id]);

header("Location: messages.php");
exit;
