<link rel="stylesheet" href="css/style.css">
<?php
    require 'database/database.php';
    $pdo = db_connect();
    $user;
    if (validate_email_user($_POST['emailRegister'], $_POST['userRegister'])) {
        $user = handle_register(); // later on, return user info to pass along
        echo '<h1>nice you registered</h1>';
        // load the quiz!
        include 'quiz.php';
    } else {
        $user = NULL;
        echo '<span class="alert">email or username already exists, please try another.</span>';
        // say email exists then redirect to index
        include 'index.php';
    }
?>
