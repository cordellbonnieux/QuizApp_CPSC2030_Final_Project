// was this page loaded with banner information?
let banner = localStorage.getItem('banner') ? localStorage.getItem('banner') : null
if (banner != null && banner.length > 0) {
    let b = document.createElement('span')
    b.className = 'alert'
    b.textContent = banner
    document.body.appendChild(b)
    localStorage.removeItem('banner')
}

// DOM elements
let wrapper = document.querySelector('.wrapper')

let containers = [
    document.getElementById('login'),
    document.getElementById('register')
]

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

let toggle = document.getElementById('toggle')
let toggled = false

// Events

//login form
forms[0].addEventListener('submit', () => {
    inputs[0].value = inputs[0].value.trim()
    inputs[1].value = inputs[1].value.trim()
    // make sure they aren't empty, or above a certain num of chars
    if (inputs[0].value.length < 3) {
        e.preventDefault()
        localStorage.setItem('banner', 'Username is too short.')
        window.location.href = 'index.php'
    }
    if (inputs[0].value.length < 6) {
        e.preventDefault()
        localStorage.setItem('banner', 'Password is too short.')
        window.location.href = 'index.php'
    }
})

//register form
forms[1].addEventListener('submit', e => {
    for (let i = 2; i < 6; i++) {
        inputs[i].value = inputs[i].value.trim()
    }
    if (inputs[4].value != inputs[5].value) {
        e.preventDefault()
        localStorage.setItem('currentForm', 'register')
        localStorage.setItem('banner', 'Passwords must match.')
        window.location.href = 'index.php'
    }
    if (!isEmail(inputs[3].value)) {
        e.preventDefault()
        localStorage.setItem('currentForm', 'register')
        localStorage.setItem('banner', 'Invalid email.')
        window.location.href = 'index.php'
    }
    if (inputs[2].value.length < 3) {
        e.preventDefault()
        localStorage.setItem('currentForm', 'register')
        localStorage.setItem('banner', 'Username is too short.')
        window.location.href = 'index.php'
    }
    if (inputs[4].value.length < 6) {
        e.preventDefault()
        localStorage.setItem('currentForm', 'register')
        localStorage.setItem('banner', 'Password is too short.')
        window.location.href = 'index.php'
    }
})

// user too short
let usr = [inputs[0], inputs[2]]
for (let i = 0; i < 2; i++) {
    usr[i].addEventListener('blur', () => {
        if (usr[i].value.trim().length < 3) {
            if (!document.getElementById(`inputs${i*2}`)) {
                let t = document.createElement('span')
                t.id = `inputs${i*2}`
                t.className = 'invalidTag'
                t.textContent = 'username is too short'
                t.style = `background: red; color: #fff;`
                insertAfter(usr[i], t)
            }
        } else {
            if (document.getElementById(`inputs${i*2}`)) {
                document.getElementById(`inputs${i*2}`).remove()
            }
        }
    })
}

// invalid email - register
inputs[3].addEventListener('blur', () => {
    if (!isEmail(inputs[3].value.trim())) {
        if (!document.getElementById('inputs3')) {
            let t = document.createElement('span')
            t.id = 'inputs3'
            t.className = 'invalidTag'
            t.textContent = 'invalid email'
            t.style = `background: red; color: #fff;`
            insertAfter(inputs[3], t)
        }
    } else {
        if (document.getElementById('inputs3')) {
            document.getElementById('inputs3').remove()
        }
    }
})

// passwords did not match - register
inputs[5].addEventListener('blur', () => {
    if (inputs[4].value != inputs[5].value) {
        if (!document.getElementById('inputs4')) {
            let t = document.createElement('span')
            t.id = 'inputs4'
            t.className = 'invalidTag'
            t.textContent = 'passwords must match'
            t.style = `background: red; color: #fff;`
            insertAfter(inputs[4], t)
        }
    } else {
        if (document.getElementById('inputs4')) {
            document.getElementById('inputs4').remove()
        }
    }
})

// toggle between login and register
toggle.addEventListener('click', () => { 
    if (toggled) {
        toggle.textContent = 'register a new account'
        toggled = false
        wrapper.removeChild(containers[1])
        wrapper.appendChild(containers[0])
    } else {
        toggle.textContent = 'login to your account'
        toggled = true
        wrapper.removeChild(containers[0])
        wrapper.appendChild(containers[1])
    }
})

// clear wrapper and add login form + toggle btn
// let wrapper contents be controled by toggle events
wrapper.innerHTML = ''
wrapper.appendChild(toggle)
if (localStorage.getItem('currentForm') == 'register') {
    wrapper.appendChild(containers[1])
} else {
    wrapper.appendChild(containers[0])
}
localStorage.removeItem('currentForm')



function isEmail(email) {
    return email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)
}

// credit: https://www.w3docs.com/snippets/javascript/how-to-insert-an-element-after-another-element-in-javascript.html
function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }