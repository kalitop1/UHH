<?php
$host = "localhost";
$dbname = "YOUR_DB_NAME";
$user = "YOUR_DB_USER";
$pass = "YOUR_DB_PASS";

try {
    $db = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("DB ERROR");
}
