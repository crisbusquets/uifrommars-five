const post = document.querySelector("article");
const readingTimeSummary = document.querySelector(".reading-time span.minutes");
const avgWordsPerMin = 220;

setReadingTime();

function setReadingTime() {
  let count = getWordCount();
  let time = Math.ceil(count / avgWordsPerMin);

  readingTimeSummary.innerText = time + " minutos";
}

function getWordCount() {
  return post.innerText.match(/[\p{Letter}\p{Number}]+/giu).length;
}
