<?php
require 'database/database.php';
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    include 'redirect.php';
} else {
    if (isset($_POST['valid'])) {
        include 'templates/quiz_page.php';
    } else {
        include 'redirect.php';
    }
}
?>