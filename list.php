<?php
$files = scandir(__DIR__);
echo "<pre>";
foreach ($files as $f) {
  if ($f === "." || $f === "..") continue;
  echo "[" . strlen($f) . "] " . var_export($f, true) . "\n";
}
echo "</pre>";
