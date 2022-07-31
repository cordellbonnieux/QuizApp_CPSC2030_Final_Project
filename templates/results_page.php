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
    <script src="js/stats.js" defer></script>
    <script src="js/results.js" defer></script>
    <script type="text/javascript">
        const scores = JSON.parse('<?php echo json_encode($scores); ?>')
        const currentScore = '<?php echo $currentScore; ?>'
    </script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="results">
        <span class="loading">page is loading...</span>
            <!-- Results injected via JS --->      
        </div>
    </div>
</body>
</html>