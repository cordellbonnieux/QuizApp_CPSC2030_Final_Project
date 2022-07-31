function scoreUI(score, total, description) {
    let wrap = document.createElement('div')
    wrap.className = 'scoreWrap'
    let p = document.createElement('p')
    p.textContent = `${score}/${total}`
    p.className = 'scoreText'
    wrap.appendChild(p)
    let p2 = document.createElement('p')
    p2.className = 'scoreDescription'
    p2.textContent = description
    wrap.appendChild(p2)
    return wrap
}

function calcAvg(user, scores) {
    let games = 0;
    let total = 0;
    for (let i = 0; i < scores.length; i++) {
        if (scores[i].user == user) {
            games++
            total += scores[i].score
        }
    }
    return total / games
}

function getRank(user, scores) {
    let userList = []
    let scoreList = []
    for (let i = 0; i < scores.length; i++) {
        if (!userList.includes(scores[i].user)) {
            userList.push(scores[i].user)
            scoreList.push({
                user: scores[i].user,
                total: scores[i].score,
                games: 1
            })
        } else {
            for (let y = 0; i < scoreList.length; y++) {
                if (scoreList[i].user == scores[i].user) {
                    scoreList[i].score += scores[i].score
                    scoreList[i].games++
                }
            }
        }
    }
    scoreList.sort((a, b) => b.score - a.score)
    let rank
    for (let i = 0; i < scoreList.length; i++) {
        if (scoreList[i].user == user) {
            rank = i + 1
        }
    }
    return {
        rank: rank,
        users: userList.length
    }
}