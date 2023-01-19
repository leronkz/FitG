const picture = document.querySelector("#prof-picture");
const userName = document.querySelector("#name-text")
const admin = document.querySelector("#admin");
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
function getData(){
    fetch("/loadData").then(function(response){
        return response.json();
    }).then(function(userData){
        showData(userData)
    });
}
function getRole(){
    fetch("/getRole").then(function (response){
        return response.json();
    }).then(function (roles){
        show(roles)
    });
}
function show(roles){
    if(roles['role']==="admin"){
        admin.style.setProperty("display","flex");
    }
    else if(roles['role']==="user"){
        admin.style.setProperty("display","none");
    }
}
function showData(userData){
    if(!userData['name'])
        userName.innerText = "Cześć";
    else
        userName.innerText = "Cześć "+userData['name'];

    if(userData['image'])
        picture.style.setProperty("background-image","url('public/uploads/"+userData['image']+"')");
    else
        picture.style.setProperty("background-image","url('public/uploads/profile_picture.svg");
}
getData();
getRole();