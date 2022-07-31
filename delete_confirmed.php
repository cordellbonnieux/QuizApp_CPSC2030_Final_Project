<?php
require 'database/database.php';
$pdo = db_connect();
$banner = '';
if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['delete'])) {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        delete_scores($_POST['user']);
        delete_user($_POST['user']);
        echo '<script type="text/javascript">localStorage.clear()</script>';
        $banner = $_POST['user'] .'\'s account has been deleted.';
    }
}
include 'redirect.php';