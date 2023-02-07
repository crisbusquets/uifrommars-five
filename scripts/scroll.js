window.addEventListener("scroll", moveScrollIndicator);
const scrollIndicatorElt = document.getElementById("scrollIndicator");
const maxScrollableHeight = window.document.body.scrollHeight - window.innerHeight;

function moveScrollIndicator(e) {
  const percentage = (window.scrollY / maxScrollableHeight) * 100;
  scrollIndicatorElt.style.width = percentage + "%";
}
