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
    <script src="js/validation.js" defer></script>
</head>
<body>
    <h1>Quiz App</h1>
    <div class="wrapper">
        <div id="login">
            <h2>Login</h1>
            <form action="account.php" method="POST">
                <label for="userLogin">
                    username or email:
                    <input type="text" id="userLogin" name="userLogin"></input>
                </label>
                <label for="passwordLogin">
                    password:
                    <input type="password" id="passwordLogin" name="passwordLogin"></input>
                </label>
                <button type="submit" name="submitLogin">login</button>
            </form>
        </div>
        <div id="register">
            <h2>Create an account</h2>
            <form action="account.php" method="POST">
                <label for="userRegister">
                    username:
                    <input type="text" id="userRegister" name="userRegister"></input>
                </label>
                <label for="emailRegister">
                    email:
                    <input type="text" id="emailRegister" name="emailRegister"></input>
                </label>
                <label for="passwordRegister">
                    password:
                    <input type="password" id="passwordRegister" name="passwordRegister"></input>
                </label>
                <label for="passwordRegister2">
                    password, again:
                    <input type="password" id="passwordRegister2" name="passwordRegister2"></input>
                </label>
                <button type="submit" name="submitRegister">register</button>
            </form>
        </div>
    </div>
</body>
</html>