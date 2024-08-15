document.addEventListener("DOMContentLoaded", () => {
  const markElement = document.getElementById("subscriber-count")
  const subscriberCount = parseFloat(markElement.innerText)
  const formattedNumber = subscriberCount.toLocaleString("es", {
    useGrouping: true,
  })
  markElement.innerText = formattedNumber
})
