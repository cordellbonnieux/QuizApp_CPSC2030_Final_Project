<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz App</title>
    <meta name="description" content="Quiz App">
    <meta name="author" content="Cordell Bonnieux">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="delete">
            <div>
                <h2>Are you sure you want to delete your account?</h2>
                <b>user: <?php echo $_POST['name'] ?></b>
                <p>Once deleted, you cannot recover your account or match history.<p>
                <div>
                    <form action="delete_confirmed.php" method="POST">
                        <input type="hidden" name="user" value="<?php echo $_POST['name']?>"></input>
                        <input type="hidden" name="email" value="<?php echo $_POST['email']?>"></input>
                        <input type="hidden" name="password" value="<?php echo $_POST['password']?>"></input>
                        <input type="hidden" name="delete" value="valid"></input>
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