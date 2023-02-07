window.addEventListener("scroll", moveScrollIndicator);
const scrollIndicator = document.getElementById("scroll-indicator");
const maxScrollableHeight = window.document.body.scrollHeight - window.innerHeight;

function moveScrollIndicator() {
  const percentage = (window.scrollY / maxScrollableHeight) * 100;
  scrollIndicator.style.width = `${percentage}%`;
}
