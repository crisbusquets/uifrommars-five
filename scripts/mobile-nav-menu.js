const menu = document.querySelector(".mobile-nav-menu")
const hamburgerButton = document.querySelector(".hamburger")

function openMenu() {
  // Display the menu.
  menu.classList.add("open")
  menu.style.height = "auto"

  // Prevent body from scrolling.
  document.body.style.overflow = "hidden"

  // Get the computed height of the menu.
  const height = `${menu.clientHeight}px`

  // Set the height of the content as 0px,
  // so we can trigger the slide-down animation.
  menu.style.height = "0px"

  // Do this after the 0px has applied.
  // It's like a delay or something. MAGIC!
  setTimeout(() => {
    menu.style.height = height
  }, 0)
}

function closeMenu() {
  // Set the height as 0px to trigger the slide up animation.
  menu.style.height = "0px"

  // Remove the `open` class when the slide-up animation ends.
  menu.addEventListener(
    "transitionend",
    () => {
      menu.classList.remove("open")
      document.body.style.overflow = "" // Revert overflow to original value
    },
    { once: true },
  )
}

hamburgerButton.addEventListener("click", () => {
  hamburgerButton.classList.toggle("is-active")

  if (!menu.classList.contains("open")) {
    openMenu()
  } else {
    closeMenu()
  }
})
