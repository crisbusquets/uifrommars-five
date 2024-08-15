const currentUrl = window.location.href
const button = document.getElementById("copy-url-btn")

button.addEventListener("click", () => {
  navigator.clipboard
    .writeText(currentUrl)
    .then(() => {
      button.innerText = "¡Copiado!"
    })
    .catch((error) => {
      console.error("Failed to copy URL: ", error)
    })
})
