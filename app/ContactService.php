<?php


require_once __DIR__ . "/Database.php";

class ContactService
{
    public function saveMessage(string $name, string $email, string $subject, string $message, ?string $createdBy = null): int
    {
        $pdo = Database::pdo();

        $stmt = $pdo->prepare("
            INSERT INTO contact_messages (name, email, subject, message, created_by)
            VALUES (:name, :email, :subject, :message, :created_by)
        ");

        $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":subject" => $subject,
            ":message" => $message,
            ":created_by" => $createdBy
        ]);

        return (int)$pdo->lastInsertId();
    }
}
