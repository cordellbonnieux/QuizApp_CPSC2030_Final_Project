/*
* Globals
*/ 
let container = document.getElementById('quiz')
let answers = []
let user = {
    name: localStorage.getItem('name'),
    email: localStorage.getItem('email')
}
let api = {
    secret: localStorage.getItem('apiSecret'),
    access: localStorage.getItem('apiAccess'),
    url: 'https://api.unsplash.com/search/photos?page=1&per_page=20&client_id=' + localStorage.getItem('apiAccess')
}
// for testing
getImages('dog').then(display)
function display(images) {
    images.forEach(element => {
        console.log(element.urls.regular)
    })
}
//

/*
* Fetch data, then start game
*/
let questions = fetch('https://the-trivia-api.com/api/questions')
questions.then(response => {
    if (response.status !== 200) {
        console.log(response.status)
        return
    }
    response.json().then(data => {
        //console.log(data)
        // start game
    }).catch(err => {
        console.log(err.message)
    })
})

/*
* Game Logic
*/
function gameLoop(questions) {
    // create ui
    // create vars
    // while there are still questions 
    while(answers.length < questions.length) {

    }
}

/*
* Functions
*/
function makeUI() {
    
}

function getImages(query) {
    let url = `${api.url}&query=${query}`
    return fetch(url).then(response => response.json()).then(result => {
            return result.results
    })
}