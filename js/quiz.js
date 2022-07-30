/*
* Globals
*/ 
let container = document.getElementById('quiz')
let answers = []
let questions = []
let user = {
    name: localStorage.getItem('name'),
    email: localStorage.getItem('email')
}
let api = {
    secret: localStorage.getItem('apiSecret'),
    access: localStorage.getItem('apiAccess'),
    url: 'https://api.unsplash.com/search/photos?page=1&per_page=20&client_id=' + localStorage.getItem('apiAccess')
}

/*
* Async Functions
* Used to fetch rest api information
*/
let fetchQuestions = () => {
    return new Promise((resolve, reject) => {
        let data = fetch('https://the-trivia-api.com/api/questions')
        data.then(response => {
            if (response.status !== 200) {
                console.log(response.status)
                return
            }
            response.json().then(list => {
                questions = list
                resolve('Resolved')
            }).catch(err => {
                console.log(err.message)
                reject('Rejected')
            })
        })
    })
}

let fetchImages = () => {
    return new Promise((resolve, reject) => {
        for (let i = 0; i < questions.length; i++) {
            let assignImages = fetch(`${api.url}&query=${questions[i].tags[0]}`)
            assignImages.then(response => {
                if (response.status !== 200) {
                    console.log(response.status)
                    return
                }
                response.json().then(res => {
                    return res.results
                })
                .then(images => {
                    console.log(images.length, questions[i])
                    if (images.length > 0) {
                        return images[0].urls.regular
                    } else {
                        return null
                    }
                })
                .then(img => {
                    questions[i].img = img
                    resolve('Resolved')
                })
                .catch(err => {
                    console.log(err.message)
                    reject('Rejected')
                }) 
            })
        }
    })
}

/*
* Fetch Questions, THEN fetch images (if possible)
*/
fetchQuestions().then(res => {
    console.log(res, 'Questions Ready')
})
.then(() => {
    // fetch the images
    fetchImages().then(res => {
        /*
        *   The line below starts the game
        */
        gameLoop()
    }).catch(err => {
        console.log(err)
    })
})
.catch(err => {
    console.log(err)
})

/*
* Main Game Loop
*/
function gameLoop(n) {
    if (answers.length < questions.length) {
        renderUI(questions[n])
    } else {
        // pass results to localstorage
        // get in php
        // post to DB
        // load leaderboard
    }
}

/*
* Functions
*/

/*
* Make UI for given Question
*/
function renderUI(question) {
    // clear container
    container.innerHTML = ''
    // add wrapper
    let wrap = make('div','quizWrap')
    // add breadcrumb
    let number = make('h3','quizNumber')
    number.textContent = `question #${answers.length+1}`
    wrap.appendChild(number)
    // add image (if applicable)
    let img
    if (question.img != null) {
        img = make('img', 'quizImg')
        img.src = question.img
    } else {
        img = make('div', 'quizImgPlaceholder')
        img.innerHTML = 'placeholder image'
    }
    wrap.appendChild(img)
    // add the question
    let text = make('h2')
    text.textContent = question.question
    wrap.appendChild(text)
    // make answer buttons
    let btnWrapper = make('div', 'quizBtnWrap')
    let a = [...question.incorrectAnswers, question.correctAnswer]
    a = shuffle(a)
    //question.incorrectAnswers.length+1
    for (let i = 0; i < a.length; i++) {
        let button = make('button', 'quizBtn', `quizBtn${i}`)
        button.innerHTML = a[i]
        button.addEventListener('click', chooseAnswer(a[i]))
        btnWrapper.appendChild(button)
    }
    wrap.appendChild(btnWrapper)
    // add everything
    container.appendChild(wrap)
}

/*
*
*/
function chooseAnswer(choice) {
    answers.push(choice)
    gameLoop(answers.length)
}

/*
* HTML element factory function
*/
function make(ele, className = null, id = null) {
    let html = document.createElement(ele)
    if (className != null) {
        html.className = className
    }
    if (id != null) {
        html.id = id
    }
    return html
}

/*
* Shuffle an Array
* Algorithm borrowed from Geeksforgeeks:
* https://www.geeksforgeeks.org/how-to-shuffle-an-array-using-javascript/
*/
function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
        let r = Math.floor(Math.random() * (i + 1));   
        let temp = arr[i];
        arr[i] = arr[r];
        arr[r] = temp;
    } 
    return arr;
 }