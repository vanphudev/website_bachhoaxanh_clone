document.getElementById("search_input").addEventListener("focus", function () {
   document.getElementById("search_popup").style.display = "block";
});

document.addEventListener("mousedown", function (event) {
   var input = document.getElementById("search_input");
   var popup = document.getElementById("search_popup");
   if (!input.contains(event.target) && !popup.contains(event.target)) {
      popup.style.display = "none";
   }
});
