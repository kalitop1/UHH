<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if ($_POST) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $file = $_FILES['file']['name'];

    $path = "../uploads/libs/" . $file;
    move_uploaded_file($_FILES['file']['tmp_name'], $path);

    $q = $db->prepare("INSERT INTO libs (name, slug, file) VALUES (?,?,?)");
    $q->execute([$name, $slug, $file]);
}
?>

<h2>Upload Library</h2>

<form method="POST" enctype="multipart/form-data">
    <input name="name" placeholder="Lib Name" required>
    <input name="slug" placeholder="Custom Link (pubg-global)" required>
    <input type="file" name="file" required>
    <button>Upload</button>
</form>

<hr>

<h3>Uploaded Files</h3>

<?php
$libs = $db->query("SELECT * FROM libs ORDER BY id DESC");
foreach ($libs as $l) {
    echo "<b>{$l['name']}</b> → ";
    echo "<a href='/lib/{$l['slug']}' target='_blank'>/lib/{$l['slug']}</a><br>";
}
?>
