document.addEventListener("DOMContentLoaded", function() {
    var banner = document.querySelector(".floating-banner");
    var toggleButton = document.getElementById("toggleBannerButton");
  
    toggleButton.addEventListener("click", function() {
      banner.classList.toggle("minimized");
    });
  });
  