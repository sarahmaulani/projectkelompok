<?php
session_start();

include("../function/koneksi.php");
include("../function/helper.php");

$module = isset($_GET['module']) ? $_GET['module'] : "dashboard";
$action = isset($_GET['action']) ? $_GET['action'] : "index";
$page   = isset($_GET['page']) ? $_GET['page'] : false;

if (!isset($_SESSION['level']) || ($_SESSION['level'] != "admin" && $_SESSION['level'] != "superadmin")) {
    header("location: login.php");
    exit;
}

?>

<link href="<?php echo BASE_URL . "css/admin.css"; ?>" type="text/css" rel="stylesheet" />

<div id="admin-content">
    <h2>Admin Panel</h2>

    <?php
    // Ganti ini untuk akses module/barang/list.php, dll
    $filename = "module/$module/$action.php";
    if ($module && $action && file_exists($filename)) {
        include_once($filename);
    } else {
        echo "<h3>Halaman tidak ditemukan: $filename</h3>";
    }
    ?>
</div>
