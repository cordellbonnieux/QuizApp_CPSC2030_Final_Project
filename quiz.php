<?php
require 'database/database.php';
//$loadPage = FALSE;
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    include 'redirect.php';
} else {
    if (isset($_POST['valid'])) {
        $loadPage = TRUE;
        include 'templates/quiz_page.php';
    } else {
        include 'redirect.php';
    }
}
?>