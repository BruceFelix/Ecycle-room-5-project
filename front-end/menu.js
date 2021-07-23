//menu dropdown
let menuBtn = document.querySelector(".menu-bar");
let searchBar = document.querySelector(".search-bar");
let links = document.querySelector(".links");
let overlay = document.querySelector(".dark-overlay");

menuBtn.addEventListener("click",()=>{
    searchBar.classList.toggle("show-flex");
    links.classList.toggle("show-links");
    overlay.classList.toggle("show-overlay");
})