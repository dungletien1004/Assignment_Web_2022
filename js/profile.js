var menuIcon = document.querySelector(".menu-icon");
var navbar = document.querySelector(".nav-bar");
var searchIcon = document.querySelector(".search-icon");
var searchbar = document.querySelector(".search-bar");

document.onclick = function () {
  if (navbar.classList.contains("active")) {
    navbar.classList.remove("active");
  }
  if (searchbar.classList.contains("active")) {
    searchbar.classList.remove("active");
  }
};
menuIcon.addEventListener("click", function (e) {
  navbar.classList.toggle("active");
  e.stopPropagation();
});
searchIcon.addEventListener("click", function (e) {
  searchbar.classList.toggle("active");
  e.stopPropagation();
});
