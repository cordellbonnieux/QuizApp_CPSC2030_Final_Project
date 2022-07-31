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

    const submit = document.createElement('input')
    submit.type = 'hidden'
    submit.name = 'submitLogin'
    submit.value = 'hereIsSomeValidText'
    form.appendChild(submit)

    form.submit()
} else {
    // if not, redirect to the login page
    window.location.href = 'login.php'
}