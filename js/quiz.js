let user = {
    name: localStorage.getItem('name'),
    email: localStorage.getItem('email')
}
let container = document.getElementById('quiz')
let questions = fetch('https://the-trivia-api.com/api/questions')
questions.then(response => {
    if (response.status !== 200) {
        console.log('fuck! ' + response.status)
        return
    }
    response.json().then(data => {
        console.log(data)
    }).catch(err => {
        console.log(err.message)
    })
})