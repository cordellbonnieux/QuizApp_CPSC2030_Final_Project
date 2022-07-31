let banner = localStorage.getItem('banner') ? localStorage.getItem('banner') : null
if (banner != null && banner.length > 0) {
    let b = document.createElement('span')
    b.className = 'alert'
    b.textContent = banner
    document.body.appendChild(b)
    localStorage.removeItem('banner')
}

// on any form submit, trim all the input strings
let forms = [
    document.getElementById('loginForm'), 
    document.getElementById('registerForm')
]
let inputs = [
    document.getElementById('userLogin'), 
    document.getElementById('passwordLogin'),
    document.getElementById('userRegister'), // 2
    document.getElementById('emailRegister'),
    document.getElementById('passwordRegister'), // 4
    document.getElementById('passwordRegister2')
]

//login form
forms[0].addEventListener('submit', () => {
    inputs[0].value = inputs[0].value.trim()
    inputs[1].value = inputs[1].value.trim()
})

//register form
forms[1].addEventListener('submit', e => {
    for (let i = 2; i < 6; i++) {
        inputs[i].value = inputs[i].value.trim()
    }
    if (inputs[4].value != inputs[5].value) {
        e.preventDefault()
        localStorage.setItem('banner', 'Passwords must match.')
    }
    if (!isEmail(inputs[3].value)) {
        e.preventDefault()
        localStorage.setItem('banner', 'Invalid email')
        window.location.href = 'index.php'
    }
})

// invalid email
inputs[3].addEventListener('blur', () => {
    if (!isEmail(inputs[3].value)) {
        inputs[3].style.border = '1px dotted red'
    } else {
        inputs[3].style.border = '1px solid #000'
    }
})

// passwords did not match
inputs[5].addEventListener('blur', () => {
    if (inputs[4].value != inputs[5].value) {
        inputs[4].style.border = '1px dotted red'
        inputs[5].style.border = '1px dotted red'
    } else {
        inputs[4].style.border = '1px solid #000'
        inputs[5].style.border = '1px solid #000'
    }
})

function isEmail(email) {
    return email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)
}