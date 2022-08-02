<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz App</title>
    <meta name="description" content="Quiz App">
    <meta name="author" content="Cordell Bonnieux">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/stats.js" defer></script>
    <script src="js/account.js" defer></script>
    <script type="text/javascript">
        //add if user is logged in before you set these
        localStorage.setItem('name', "<?php echo $user['name'] ?>")
        localStorage.setItem('email', "<?php echo $user['email'] ?>")
        localStorage.setItem('password', "<?php echo $user['password'] ?>")
        const scores = JSON.parse('<?php echo json_encode($scores); ?>')
    </script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="account">
        <span class="loading">page is loading...</span>
        <!-- account and link to play quiz.php injected via JS --->
        </div>
    </div>
</body>
</html>