document.getElementById("downloadBadge").addEventListener("click", function () {
  let badgeElement = document.querySelector(".realBadge");

  html2canvas(badgeElement, { scale: 2 }).then((canvas) => {
    let link = document.createElement("a");
    link.href = canvas.toDataURL("image/png");
    link.download = "badge_aem.png";
    link.click();
  });
});
