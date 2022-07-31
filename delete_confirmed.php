<?php
require 'database/database.php';
$pdo = db_connect();
if ($_SERVER['REQUEST_METHOD'] != "POST" || !isset($_POST['delete'])) {
    include 'redirect.php';
} else {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        delete_scores($_POST['user']);
        delete_user($_POST['user']);
        echo '<script type="text/javascript">localStorage.clear()</script>';
        // make some banner to display on login page saying acc deleted
    }
    include 'redirect.php';
}
