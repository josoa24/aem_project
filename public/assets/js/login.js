const button = document.querySelector(".sign-in");
button.addEventListener("click", function (event) {
  button.innerHTML = `
          <section class="dots-container" style="display: flex;">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
          </section>
      `;
});
