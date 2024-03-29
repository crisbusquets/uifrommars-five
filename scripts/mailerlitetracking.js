// Function to add class to the button
function addClassToButton(button) {
  button.classList.add("plausible-event-name=Newsletter");
}

// Function to check if the button is available and add class to it
function checkAndAddClass() {
  const buttons = document.querySelectorAll(".primary");
  buttons.forEach(function (button) {
    if (!button.classList.contains("plausible-event-name=Newsletter")) {
      addClassToButton(button);
    }
  });
}

// Listen for the DOMContentLoaded event to ensure the button is available
window.addEventListener("DOMContentLoaded", function () {
  // Check and add class to the button once the DOM content is loaded
  checkAndAddClass();

  // If the button is dynamically loaded after DOMContentLoaded event,
  // you can also use MutationObserver to observe changes in the DOM.
  const observer = new MutationObserver(function (mutationsList) {
    mutationsList.forEach(function (mutation) {
      if (mutation.type === "childList") {
        // Check and add class to the button if it's added dynamically
        checkAndAddClass();
      }
    });
  });

  // Start observing changes in the DOM
  observer.observe(document.body, { childList: true, subtree: true });
});
