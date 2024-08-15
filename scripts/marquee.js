// Get the element
let elem = document.querySelector(".marquee-element")

// Number of times to repeat
const REPEAT_COUNT = 7

// Create and inject clones into the DOM
for (let i = 0; i < REPEAT_COUNT - 1; i++) {
  // Create a copy of the element
  const clone = elem.cloneNode(true)

  // Inject the clone into the DOM after the original element
  elem.after(clone)
}

document.getElementById("close-marquee").addEventListener("click", () => {
  const marquee = document.getElementById("marquee")
  marquee.style.display = "none"
})
