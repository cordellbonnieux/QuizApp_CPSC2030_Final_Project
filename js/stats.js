function scoreUI(score, description, total=null) {
    let wrap = document.createElement('div')
    wrap.className = 'scoreWrap'
    let p = document.createElement('p')
    if (total != null && !isNaN(score)) {
        p.textContent = `${score}/${total}`
    } else {
        p.textContent = score
    }
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
    let avg = games > 0 ? total / games : 0
    return Math.round(avg * 10) / 10
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
            for (let y = 0; y < scoreList.length; y++) {
                if (scoreList[y].user == scores[i].user) {
                    scoreList[y].score += scores[i].score
                    scoreList[y].games++
                }
            }
        }
    }
    scoreList.sort((a, b) => b.score - a.score)
    let rank = null
    for (let i = 0; i < scoreList.length; i++) {
        if (scoreList[i].user == user) {
            rank = i + 1
        }
    }
    return {
        rank: rank != null ? rank : 'no rank yet',
        outOf: rank != null ? userList.length : '',
        totalGames: rank != null ? scoreList[rank-1].games : 0
    }
}