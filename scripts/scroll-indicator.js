window.addEventListener('scroll', () => {
  const scrollIndicator = document.getElementById('scroll-indicator')
  const maxScrollableHeight = document.body.scrollHeight - window.innerHeight
  const percentage = (window.scrollY / maxScrollableHeight) * 100
  scrollIndicator.style.width = `${percentage}%`
})
