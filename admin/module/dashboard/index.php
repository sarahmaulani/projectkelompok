<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/koneksi.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/Ecommerse Food/function/helper.php");


if (!isset($_SESSION['admin_id']) || !isset($_SESSION['level'])) {
    header("Location: ../login.php");

    exit;
}

$admin_id = $_SESSION['admin_id'];
$level = $_SESSION['level'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="<?php echo BASE_URL . "css/style.css"; ?>" type="text/css" rel="stylesheet" />
    <?php if ($level == "superadmin") { ?>
        <link href="<?php echo BASE_URL . "css/admin.css"; ?>" type="text/css" rel="stylesheet" />
    <?php } ?>
</head>
<body>

<div id="admin-container">
    <h1>Admin Dashboard</h1>
    <ul>
    <li><a href="<?php echo BASE_URL . "admin/index.php?module=kategori&action=list"; ?>">Kelola Kategori</a></li>
    <li><a href="<?php echo BASE_URL . "admin/index.php?module=barang&action=list"; ?>">Kelola Barang</a></li>
    <li><a href="<?php echo BASE_URL . "admin/index.php?module=banner&action=list"; ?>">Kelola Banner</a></li>
    <li><a href="<?php echo BASE_URL . "admin/logout.php"; ?>">Logout</a></li>
</ul>


</div>

</body>
</html>
