<?php
    require 'database/database.php';
    $pdo = db_connect();
    $currentScore = submit_score();
    $scores = get_scores();
    include 'templates/results_page.php'; 
?>