const lessonAccordion = function() {
  const acc = document.querySelectorAll(".section-title")
  const panel = document.querySelectorAll(".section-list")

  for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      var setClasses = !this.classList.contains("active")
      setClass(acc, "active", "remove")
      setClass(panel, "show", "remove")

      if (setClasses) {
        this.classList.toggle("active")
        this.nextElementSibling.classList.toggle("show")
      }
      return false
    }
  }

  function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
      els[i].classList[fnName](className)
    }
  }
}

lessonAccordion()
