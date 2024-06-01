const AVG_READ_WORDS_PER_MINUTE = 220

const post = document.querySelector('article')
const minutes = document.querySelector('.reading-time .minutes')

const wordCount = post.innerText.match(/[\w-]+/giu).length
const averageTimeInMinutes = Math.ceil(wordCount / AVG_READ_WORDS_PER_MINUTE)

minutes.innerText = averageTimeInMinutes
