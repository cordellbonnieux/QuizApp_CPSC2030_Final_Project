<?php
    require 'database/database.php';

    $pdo = db_connect();
    $currentScore = submit_score();
    $scores = get_scores();
    // get your avg score
    // get your overall ranking
    // get your total number of games
    // add a play again button
    include 'templates/results_page.php'; 
?>