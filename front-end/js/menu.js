let menuBtn = document.querySelector(".menu-bar");
let searchBar = document.querySelector(".search-bar");
let links = document.querySelector(".links");
let overlay = document.querySelector(".dark-overlay");

 menuBtn.addEventListener("click",()=>{
     searchBar.classList.toggle("show-flex");
     links.classList.toggle("show-links");
     overlay.classList.toggle("show-overlay");
 })

 overlay.addEventListener("click",()=>{
    searchBar.classList.toggle("show-flex");
    links.classList.toggle("show-links");
       overlay.classList.toggle("show-overlay");

})
// let filter_icon = document.querySelector(".filter")
// let form_filter = document.querySelector(".form-filter")

// filter_icon.addEventListener("click",function(){
//      form_filter.classList.toggle("show-grid")
//  })