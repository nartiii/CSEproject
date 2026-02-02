<?php
require_once __DIR__ . "/guard.php";
require_once __DIR__ . "/../app/Database.php";

$pdo = Database::connect();

$id = (int)($_GET["id"] ?? 0);
$role = $_GET["role"] ?? "";

if ($id <= 0 || ($role !== "admin" && $role !== "user")) {
  header("Location: users.php");
  exit;
}

// optional safety: don't allow changing your own role
// comment this out if you want to allow it
$currentUserId = (int)($_SESSION["user"]["id"] ?? 0);
if ($currentUserId === $id) {
  header("Location: users.php");
  exit;
}

$stmt = $pdo->prepare("update users set role = ? where id = ?");
$stmt->execute([$role, $id]);

header("Location: users.php");
exit;
