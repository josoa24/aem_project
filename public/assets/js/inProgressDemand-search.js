const allButtons = document.querySelectorAll(".buttons");
const imageContainer = document.querySelectorAll(".images");
const cancelIcons = document.querySelectorAll(".icon-closer");
allButtons.forEach((button) => {
  button.addEventListener("click", () => {
    let index = button.getAttribute("data-index");
    imageContainer.forEach((image) => {
      if (image.getAttribute("data-index") === index) {
        image.style.display = "flex";
      } else {
        image.style.display = "none";
      }
    });
  });
});
cancelIcons.forEach((icon) => {
    icon.addEventListener("click", () => {
        imageContainer.forEach((image) => {
            image.style.display = "none";
        });
    });
});