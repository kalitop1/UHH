<?php
session_start();

if ($_POST) {
    if ($_POST['user'] === "admin" && $_POST['pass'] === "123456") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    }
}
?>

<form method="POST">
    <input name="user" placeholder="Username">
    <input name="pass" type="password" placeholder="Password">
    <button>Login</button>
</form>
