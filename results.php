<?php
    require 'database/database.php';
    $pdo = db_connect();
    $didSubmit = submit_score();
    echo $_POST['user'] .':  ' .$_POST['score'];
    include 'templates/results_page.php'; 
?>