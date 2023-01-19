function getDate(){
    let currentDate = document.querySelector(".current-date");
    let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth(),
    currDay = date.getDate();
    // currentDate.innerText=`${currDay}.${currMonth+1}.${currYear}`;
    currentDate.innerText = date.toISOString().slice(0,10);
}

getDate();