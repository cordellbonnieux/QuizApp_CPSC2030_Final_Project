const username = localStorage.getItem('name')
let container = document.getElementById('results')

//
console.log('all scores: ', scores)
console.log('current user:', username)
console.log('current score:', currentScore)
//

// display results
results()


function results() {
    container.innerHTML = ''
    let title = document.createElement('h2')
    title.textContent = 'game summary'
    container.appendChild(title)
    container.appendChild(scoreUI(currentScore, 10, 'your score'))
    // secondary stats
    let statsContainer = document.createElement('div')
    statsContainer.className = 'statsContainer'
    statsContainer.appendChild(scoreUI(calcAvg(username, scores), 10, 'your average score'))
    let leaderboard = getRank(username, scores)
    statsContainer.appendChild(scoreUI(leaderboard.rank, leaderboard.users, 'your rank on the leaderboard'))
    container.appendChild(statsContainer)
}

