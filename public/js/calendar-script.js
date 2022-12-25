const currentDate = document.querySelector(".current-date"),
daysTag = document.querySelector(".days");
prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();


const months = ["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik",
                "Listopad","Grudzień"];

const renderCalendar = () =>{
    let firstDayOfMonth = new Date(currYear,currMonth,1).getDay(),
    lastDateOfMonth = new Date(currYear,currMonth+1,0).getDate(),
    lastDayOfMonth = new Date(currYear,currMonth,lastDateOfMonth).getDate(),
    lastDateOfLastMonth = new Date(currYear,currMonth,0).getDate();

    let liTag = "";

    for(let i=firstDayOfMonth; i>0; i--){
        liTag+=`<li class="inactive">${lastDateOfLastMonth - i +1}</li>`;
    }

    for(let i=1; i<=lastDateOfMonth; i++){
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        liTag+= `<li class="${isToday}">${i}</li>`;
    }
    
    for(let i=lastDayOfMonth; i<6; i++){
        liTag+=`<li class="inactive">${i - lastDayOfMonth + 1}</li>`;
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon =>{

    icon.addEventListener("click",() =>{
        currMonth = icon.id === "prev" ? currMonth-1 : currMonth+1;

        if(currMonth <0 || currMonth>11){
            date = new Date(currYear,currMonth);
            currYear=date.getFullYear();
            currMonth = date.getMonth();
        }
        else{
            date = new Date();
        }
        renderCalendar();
    });
});

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