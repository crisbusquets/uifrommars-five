const dialog = document.querySelector('dialog')
const magnifyingGlassIcon = document.querySelector('.show')
const xMarkIcon = document.querySelector('.close')

magnifyingGlassIcon.addEventListener('click', () => {
  dialog.showModal()
})

xMarkIcon.addEventListener('click', () => {
  dialog.close()
})

// Close dialog when clicking anywhere outside the dialog.
// https://stackoverflow.com/a/78162582
dialog.addEventListener('click', (event) => {
  if (event.target === dialog) {
    dialog.close()
  }
})
