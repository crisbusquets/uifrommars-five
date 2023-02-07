document.addEventListener("DOMContentLoaded", function () {
  // https://codepen.io/kccnma/pen/NEOLoR

  // Target elements
  const container = document.querySelector("#search-container");
  const backgroundShade = document.querySelector("#search-shade");
  const searchIcon = document.querySelector("#search-icon");
  const closeButton = document.querySelector("#search-close");
  const input = document.querySelector("#search-input");

  // Open - add classes
  searchIcon.onclick = function () {
    container.classList.add("active");
    backgroundShade.classList.add("active");
    input.focus();
  };

  // Close - remove classes
  closeButton.onclick = function () {
    container.classList.remove("active");
    backgroundShade.classList.remove("active");
  };
});
