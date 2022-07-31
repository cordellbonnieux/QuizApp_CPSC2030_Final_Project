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
    <script type="text/javascript">
        // if local storage exists make a post request to account.php to login
        if (localStorage.getItem('name') && localStorage.getItem('password')) {
            const form = document.createElement('form')
            form.method = 'POST'
            form.action = 'account.php'
            document.body.appendChild(form)

            const userField = document.createElement('input')
            userField.type = 'hidden'
            userField.name = 'userLogin'
            userField.value = localStorage.getItem('name')
            form.appendChild(userField)

            const passField = document.createElement('input')
            passField.type = 'hidden'
            passField.name = 'passwordLogin'
            passField.value = localStorage.getItem('password')
            form.appendChild(passField)
            form.submit()
        } else {
        // if not, redirect to the login page
            window.location.href = 'login.php'
        }
    </script>
</head>
<body>
</body>
</html>