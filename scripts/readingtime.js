const post = document.querySelector("article");
const readingTimeSummary = document.querySelector(".reading-time span.minutes");
const AVG_WORDS_PER_MIN = 220;

setReadingTime();

function setReadingTime() {
  let count = getWordCount();
  let time = Math.ceil(count / AVG_WORDS_PER_MIN);

  readingTimeSummary.innerText = time;
}

function getWordCount() {
  return post.innerText.match(/[\w-]+/giu).length;
}
