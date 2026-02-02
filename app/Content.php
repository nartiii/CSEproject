<?php

final class Content
{
  public static function getMany(PDO $pdo, array $keys): array
  {
    if (!$keys) return [];

    $placeholders = implode(",", array_fill(0, count($keys), "?"));
    $stmt = $pdo->prepare("select content_key, content_value from content_blocks where content_key in ($placeholders)");
    $stmt->execute($keys);

    $out = [];
    foreach ($stmt->fetchAll() as $row) {
      $out[$row["content_key"]] = $row["content_value"];
    }
    return $out;
  }
}
