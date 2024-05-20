document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".star")

  stars.forEach((star) => {
    star.addEventListener("click", () => {
      const value = star.getAttribute("data-value")
      stars.forEach((s) => {
        s.classList.remove("selected")
      })
      star.classList.add("selected")
      if (star.nextElementSibling) {
        let nextSibling = star.nextElementSibling
        while (nextSibling) {
          nextSibling.classList.remove("selected")
          nextSibling = nextSibling.nextElementSibling
        }
      }
      console.log(`Rating: ${value}`)
    })

    star.addEventListener("mouseover", () => {
      star.classList.add("hovered")
      star.previousElementSibling?.classList.add("hovered")
      if (star.nextElementSibling) {
        let nextSibling = star.nextElementSibling
        while (nextSibling) {
          nextSibling.classList.remove("hovered")
          nextSibling = nextSibling.nextElementSibling
        }
      }
    })
  })
})
