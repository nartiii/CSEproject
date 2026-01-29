<?php
class Auth {
  public static function start(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
  }

  public static function user(): ?array {
    self::start();
    return $_SESSION["user"] ?? null;
  }

  public static function login(array $user): void {
    self::start();
    $_SESSION["user"] = [
      "id" => (int)$user["id"],
      "name" => $user["name"],
      "email" => $user["email"],
      "role" => $user["role"]
    ];
  }

  public static function logout(): void {
    self::start();
    unset($_SESSION["user"]);
  }

  public static function requireLogin(): void {
    if (!self::user()) {
      header("Location: /courtline/login.php");
      exit;
    }
  }

  public static function requireAdmin(): void {
    self::requireLogin();
    if (self::user()["role"] !== "admin") {
      http_response_code(403);
      echo "Forbidden";
      exit;
    }
  }
}
