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
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="results">
            oioioi
            <?php
                if (isset($_POST['score'])) {
                    echo '<h4>I recieved this score: ' .$_POST['score'] .'</h4>';
                } else {
                    echo '<h4> shit okay</h4>';
                }
            ?>
        </div>
    </div>
</body>
</html>