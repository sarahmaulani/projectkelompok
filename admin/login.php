<?php
session_start();
include_once("../function/koneksi.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND level='admin'");
    if ($row = mysqli_fetch_assoc($query)) {
        if ($password == $row['password']) {
            $_SESSION['admin_id'] = $row['user_id'];
            $_SESSION['admin_nama'] = $row['nama'];
            $_SESSION['level'] = $row['level']; // <-- ini yang sebelumnya belum ada

           header("Location: index.php"); // sebelumnya mungkin dashboard.php

            exit;
        }
    }
    $error = "Login gagal!";
}
?>

<h2>Login Admin</h2>
<form method="POST">
    <input type="text" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button name="login">Login</button>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
