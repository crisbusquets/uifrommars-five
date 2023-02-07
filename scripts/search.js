document.addEventListener("DOMContentLoaded", function () {
  // https://codepen.io/kccnma/pen/NEOLoR

  // Target elements
  var hiddensearch = document.querySelector("#search-form");
  var searchshade = document.querySelector("#search-shade");

  // Open - add classes
  var toggleicon = document.querySelector(".toggleicon");
  toggleicon.onclick = function () {
    hiddensearch.classList.toggle("active");
    searchshade.classList.toggle("active");
    document.getElementById("search-focus").focus();
  };

  // Close - remove classes
  var closebutton = document.querySelector(".closebutton");
  closebutton.onclick = function () {
    hiddensearch.classList.remove("active");
    searchshade.classList.remove("active");
  };
});
