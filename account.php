<link rel="stylesheet" href="css/style.css">
<?php
require 'database/database.php';
$pdo = db_connect();
$user;

// coming from index login or register
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submitRegister'])) {
        // this is a registration
        if (validate_email_user($_POST['emailRegister'], $_POST['userRegister'])) {
            $user = handle_register();
            $scores = get_scores();
            include 'templates/account_page.php';
        } else {
            $user = NULL;
            // this message may not work now
            echo '<span class="alert">email or username already exists, please try another.</span>';
            include 'redirect.php';
        }
    } else if (isset($_POST['submitLogin'])) {
        // this is a login
        $user = handle_login();
        if($user) {
            // logged in
            $scores = get_scores();
            include 'templates/account_page.php';
        } else {
            // password or user name did not match
            // this message may not work now
            echo '<span class="alert">username/email or password did not match, please try again.</span>';
            include 'redirect.php';
        }
    }
} else {
// coming from link or stored login
    include 'index.php';
    // index will redirect back here using a POST to validate login
}
