<?php
require "../config/db.php";

$slug = $_GET['lib'] ?? null;
if (!$slug) die("404");

$q = $db->prepare("SELECT * FROM libs WHERE slug=?");
$q->execute([$slug]);
$lib = $q->fetch();

if (!$lib) die("Not Found");

$file = "../uploads/libs/" . $lib['file'];

if (!file_exists($file)) die("File Missing");

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$lib['file']);
header("Content-Length: " . filesize($file));
readfile($file);
exit;
