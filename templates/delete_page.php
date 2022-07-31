<?php
//$_POST['name']
//isset($_POST['password'] $_POST['email']
//require 'database/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz App</title>
    <meta name="description" content="Quiz App">
    <meta name="author" content="Cordell Bonnieux">

    <link rel="icon" href="/favicon.ico">

    <link rel="stylesheet" href="css/style.css">
    <script src="js/delete.js"></script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="delete">
            <div>
                <h2>Are you sure you want to delete your account?</h2>
                <p>Once deleted, you cannot recover your account or match history.<p>
                <div>
                    <form action="" method="POST">
                        <input type="hidden" name="valid" value="valid"></input>
                        <button type="submit">Yes, delete my account</button>
                    </form>
                    <a href="index.php">
                        <button>No, I changed my mind</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>