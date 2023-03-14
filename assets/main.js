

const phrases = [
    {
        'phrase' : 'Добрий день',
        'transcription' : "dobryj den'",
        'translation' : "Hello"
    },
    {
        'phrase' : 'Дякую',
        'transcription' : "d'akuju",
        'translation' : "Thank you"
    },
    {
        'phrase' : 'Привіт',
        'transcription' : "pryvit",
        'translation' : "Hi"
    } 
]

let randomPhrase = phrases[Math.floor(Math.random() * phrases.length)];


document.querySelector('#phrase').append(randomPhrase.phrase);
document.querySelector('#transcription').append(randomPhrase.transcription);
document.querySelector('#translation').append(randomPhrase.translation);

