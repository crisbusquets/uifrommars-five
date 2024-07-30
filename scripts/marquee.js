// Get the element
var elem = document.querySelector(".marquee-element");

// Number of times to repeat
var repeatCount = 7;

// Create and inject clones into the DOM
for (let i = 0; i < repeatCount - 1; i++) {
  // Create a copy of the element
  var clone = elem.cloneNode(true);

  // Inject the clone into the DOM after the original element
  elem.after(clone);

  // Update `elem` to point to the newly inserted clone for the next iteration
  elem = clone;
}

document.getElementById("close-marquee").addEventListener("click", function () {
  var marquee = document.getElementById("marquee");
  marquee.style.display = "none";
});
