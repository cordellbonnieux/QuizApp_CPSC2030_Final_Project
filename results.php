<?php
require 'database/database.php';
//$loadPage = FALSE;
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    include 'redirect.php';
} else {
    if (isset($_POST['score'])) {
        $pdo = db_connect();
        $currentScore = submit_score();
        $scores = get_scores();
        $loadPage = TRUE;
        include 'templates/results_page.php'; 
    } else {
        include 'redirect.php';
    }
}
?>