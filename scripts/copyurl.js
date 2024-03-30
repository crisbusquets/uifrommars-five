document.getElementById("copy-url-btn").addEventListener("click", function () {
  // Get the current URL
  var currentUrl = window.location.href;

  // Use the Clipboard API to copy the URL to the clipboard
  navigator.clipboard
    .writeText(currentUrl)
    .then(function () {
      // Update the button text to indicate URL copied
      document.getElementById("copy-url-btn").innerText = "¡Copiado!";
    })
    .catch(function (error) {
      console.error("Failed to copy URL: ", error);
    });
});
