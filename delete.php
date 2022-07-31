<?php
require 'database/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
        include 'templates/delete_page.php';
    } else {
        include 'redirect.php';
    }
} else {
    include 'redirect.php';
}
?>