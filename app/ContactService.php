<?php

require_once __DIR__ . "/Database.php";

final class ContactService
{
  public function saveMessage(string $name, string $email, string $message, ?string $createdBy = null): int
  {
    $pdo = Database::connect();

    $stmt = $pdo->prepare(
      "insert into contact_messages (name, email, message, created_by)
       values (?, ?, ?, ?)"
    );

    $stmt->execute([$name, $email, $message, $createdBy]);

    return (int)$pdo->lastInsertId();
  }
}
