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
statsContainer.appendChild(scoreUI(calcAvg(username, scores), 'your average score', 10))

// get leaderboard rankings
let leaderboard = getRank(username, scores)
statsContainer.appendChild(scoreUI(leaderboard.rank, 'your rank on the leaderboard', leaderboard.outOf))
statsContainer.appendChild(scoreUI(leaderboard.totalGames, 'total games you\'ve played'))

// append all secondary stats
container.appendChild(statsContainer)

console.log(scores)


