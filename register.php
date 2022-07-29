<link rel="stylesheet" href="css/style.css">
<?php
    require 'database/database.php';
    $pdo = db_connect();
    $user;
    if (validate_email_user($_POST['emailRegister'], $_POST['userRegister'])) {
        $user = handle_register();
        // TODO pass on user info
        include 'quiz.php';
    } else {
        $user = NULL;
        echo '<span class="alert">email or username already exists, please try another.</span>';
        include 'index.php';
    }
?>
