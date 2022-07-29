<link rel="stylesheet" href="css/style.css">
<?php
    require 'database/database.php';
    $pdo = db_connect();
    $user = handle_login();
    if($user) {
        // logged in
        include 'quiz.php';
    } else {
        // password or user name did not match
        echo '<span class="alert">username/email or password did not match, please try again.</span>';
        include 'index.php';
    }
?>