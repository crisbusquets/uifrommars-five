document.addEventListener("DOMContentLoaded", function () {
  var markElement = document.getElementById("thousandsNumber");
  var number = parseFloat(markElement.innerText.replace(/\./g, "").replace(/\,/g, "."));
  markElement.innerText = number.toLocaleString("es", { useGrouping: true });
});
