// Function to check if the button is available and add class to it
function checkAndAddClass() {
  const buttons = document.querySelectorAll('.primary')
  buttons.forEach((button) => {
    if (!button.classList.contains('plausible-event-name=Newsletter')) {
      button.classList.add('plausible-event-name=Newsletter')
    }
  })
}

// Listen for the DOMContentLoaded event to ensure the button is available
window.addEventListener('DOMContentLoaded', () => {
  // Check and add class to the button once the DOM content is loaded
  checkAndAddClass()

  // If the button is dynamically loaded after DOMContentLoaded event,
  // you can also use MutationObserver to observe changes in the DOM.
  const observer = new MutationObserver((mutationsList) => {
    mutationsList.forEach((mutation) => {
      if (mutation.type === 'childList') {
        // Check and add class to the button if it's added dynamically
        checkAndAddClass()
      }
    })
  })

  // Start observing changes in the DOM
  observer.observe(document.body, { childList: true, subtree: true })
})
