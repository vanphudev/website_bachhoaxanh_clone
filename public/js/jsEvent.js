const menuFixedHover = document.getElementById("menu-fixed-hover");
const accordionExample = document.getElementById("accordionExample");
const hoverTrigger = document.getElementById("hover-trigger");
document.addEventListener("click", function (event) {
   if (event.target === accordionExample || accordionExample.contains(event.target)) {
      console.log("Clicked inside accordionExample");
   } else {
      menuFixedHover.style.display = "none";
   }
});
hoverTrigger.addEventListener("mouseenter", function () {
   menuFixedHover.style.display = "block";
});
accordionExample.addEventListener("mouseleave", function () {
   menuFixedHover.style.display = "none";
});

window.addEventListener("scroll", function () {
   var targetElement = document.getElementById("target-element");
   var scrollTop = window.scrollY;
   if (scrollTop >= 120) {
      targetElement.style.boxShadow =
         "rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px";
   } else {
      targetElement.style.boxShadow = "none";
   }
});

document.querySelector(".stretched-link-card").addEventListener("click", function () {
   var link = this.querySelector("a");
   if (link) {
      var url = link.getAttribute("href");
      window.location.href = url;
      alert("msg");
   }
});

function showMenu() {
   var menus = document.querySelectorAll(".navigation-menu");
   menus.forEach(function (menu) {
      menu.style.display = "block";
   });
}



document.addEventListener('DOMContentLoaded', function () {
   var rows = document.querySelectorAll('#table-select-row tbody tr');
   rows.forEach(function (row) {
      row.addEventListener('click', function () {
         // Remove the background from all rows
         rows.forEach(function (r) {
            r.classList.remove('selected');
         });
         // Set the background for the clicked row
         row.classList.add('selected');
      });
   });
});