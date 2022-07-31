const username = localStorage.getItem('name')
const pass = localStorage.getItem('password')
const email = localStorage.getItem('email')
let container = document.getElementById('account')

// clear 
container.innerHTML = ''

// title
let title = document.createElement('h2')
title.textContent = 'Hello ' + username + ', welcome to your dashboard.'
container.appendChild(title)

// account options
let accOptions = document.createElement('div')
accOptions.className = 'accOptions'
container.appendChild(accOptions)

// log out
let logOut = document.createElement('button')
logOut.innerHTML = 'log out'
logOut.addEventListener('click', () => {
    localStorage.clear()
    window.location.href = 'index.php'
})
accOptions.appendChild(logOut)

// delete account
let deleteAcc = document.createElement('form')
deleteAcc.method = "POST"
deleteAcc.action = "delete.php"
let del = document.createElement('input')
del.type = 'submit'
del.value = 'delete account'
del.addEventListener('click', () => {
    let u = document.createElement('input')
    u.value = username
    u.type = hidden
    u.name = 'name'
    deleteAcc.appendChild(u)
    let p = document.createElement('input')
    p.value = password
    p.type = hidden
    p.name = 'password'
    deleteAcc.appendChild(p)
    let e = document.createElement('input')
    e.value = email
    e.type = hidden
    e.name = 'email'
    deleteAcc.appendChild(e)
})
deleteAcc.appendChild(del)
accOptions.appendChild(deleteAcc)

// secondary stats
let statsContainer = document.createElement('div')
statsContainer.className = 'statsContainer'
statsContainer.appendChild(scoreUI(calcAvg(username, scores), 'your average score', 10))

// get leaderboard rankings
let leaderboard = getRank(username, scores)
statsContainer.appendChild(scoreUI(leaderboard.rank, 'your rank on the leaderboard', leaderboard.outOf))
statsContainer.appendChild(scoreUI(leaderboard.totalGames, 'total games you\'ve played'))

// append all secondary stats
container.appendChild(statsContainer)

// create play again button
let form = document.createElement('form')
form.action = 'quiz.php'
form.method = 'POST'
let play = document.createElement('input')
play.type = 'submit'
play.value = 'play now'
play.name = 'valid'
form.appendChild(play)
container.appendChild(form)
