<?php
require "../config/db.php";
?>

<h1>KALI LIBRARY</h1>

<?php
$libs = $db->query("SELECT * FROM libs ORDER BY id DESC");
foreach ($libs as $l) {
    echo "<div>";
    echo "<h3>{$l['name']}</h3>";
    echo "<a href='/lib/{$l['slug']}'>Download</a>";
    echo "</div><hr>";
}
?>
