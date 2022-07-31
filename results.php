<?php
require 'database/database.php';
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    include 'redirect.php';
} else {
    if (isset($_POST['score'])) {
        $pdo = db_connect();
        $currentScore = submit_score();
        $scores = get_scores();
        include 'templates/results_page.php'; 
    } else {
        include 'redirect.php';
    }
}
?>