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
    <script src="js/results.js" defer></script>
    <script type="text/javascript">
        // maybe pass to local storage?
    </script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="results">
            <?php
                if ($didSubmit) {
                    echo '<h4>It did submit: ' .$_POST['user'] .', ' .$_POST['score'] .'</h4>';
                } else {
                    echo '<h4>it did not submit</h4>';
                }
            ?>
        </div>
    </div>
</body>
</html>