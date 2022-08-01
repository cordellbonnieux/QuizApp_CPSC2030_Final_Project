const username = localStorage.getItem('name')
let container = document.getElementById('results')

// build ui to to display results
container.innerHTML = ''
let title = document.createElement('h2')
title.textContent = username + '\'s game summary:'
container.appendChild(title)
container.appendChild(scoreUI(currentScore, 'your score', 10))

// secondary stats
let statsContainer = document.createElement('div')
statsContainer.className = 'statsContainer'
statsContainer.appendChild(scoreUI(calcAvg(username, scores), 'average score', 10))

// get leaderboard rankings
let leaderboard = getRank(username, scores)
statsContainer.appendChild(scoreUI(leaderboard.rank, 'rank on the leaderboard', leaderboard.outOf))
statsContainer.appendChild(scoreUI(leaderboard.totalGames, 'total games'))

// append all secondary stats
container.appendChild(statsContainer)

// btn container
let btnContainer = document.createElement('div')
btnContainer.className = 'btnContainer'
container.appendChild(btnContainer)

// back to dashboard
let dash = document.createElement('button')
dash.textContent = 'return to dashboard'
dash.addEventListener('click', () => window.location.href = 'index.php')
btnContainer.appendChild(dash)

// create play again button
let form = document.createElement('form')
form.action = 'quiz.php'
form.method = 'POST'
let play = document.createElement('input')
play.type = 'submit'
play.value = 'play again'
play.name = 'valid'
form.appendChild(play)
btnContainer.appendChild(form)