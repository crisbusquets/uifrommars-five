// https://stackoverflow.com/a/78162582
dialog.addEventListener("click", (event) => {
  if (event.target === dialog) {
    dialog.close();
  }
});
