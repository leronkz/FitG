function toogleNav(){
    let body = document.querySelector("body");
    body.classList.toggle("nav-open");
}

document.querySelector(".open-nav").addEventListener("click",()=>{
    let button = document.querySelector(".open-nav");
    button.style.display="none";
    toogleNav();
})
document.querySelector(".nav-close").addEventListener("click",()=>{
    let button = document.querySelector(".open-nav");
    button.style.display="block";
    toogleNav();
})