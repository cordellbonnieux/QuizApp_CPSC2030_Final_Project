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
    <script src="js/quiz.js" defer></script>
    <script type="text/javascript">
        // pass unsplash api data to local storage
        localStorage.setItem('apiSecret', "<?php echo getUnsplashData()['secret'] ?>")
        localStorage.setItem('apiAccess', "<?php echo getUnsplashData()['access'] ?>")
    </script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="quiz">
        <span class="loading">page is loading...</span>
            <!-- Quiz Area injected via JS --->
        </div>
    </div>
</body>
</html>