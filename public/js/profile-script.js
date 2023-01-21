const name = document.querySelector("#name");
const surname = document.querySelector("#surname");
const birthday = document.querySelector("#birthday");
const weight = document.querySelector("#weight");
const height = document.querySelector("#height");
const sex_man = document.querySelector("#sex_MALE");
const sex_woman = document.querySelector("#sex_FEMALE");
const form = document.querySelector("form");

function containsWhitespace(str){
    return /\s/.test(str);
}
function checkName(str){
    if(str.length === 0)
        return true;
    for(let i=0; i<str.length; i++){
        if(str[i]>='0' && str[i]<='9')
            return false;
    }
    if(containsWhitespace(str))
        return false;
    return true;
}
function checkDate(date){
    if(date.length === 0)
        return true;

    let currDate = new Date();
    currYear = currDate.getFullYear();
    currMonth = currDate.getMonth()+1;
    currDay = currDate.getDate();

    let d = new Date(date);

    if(!!d.valueOf()){
        year = d.getFullYear();
        month = d.getMonth()+1;
        day = d.getDate();
        if(year>currYear)
            return false;
        if(year===currYear && month>currMonth)
            return false;
        if(year===currYear && month===currMonth && day>currDay)
            return false;
        return true;
    }else{
        return false;
    }
}
function isNumber(num) {
    return num >= 0;

}
function isSelected(){
    if(!sex_man.checked && !sex_woman.checked)
        return false;
}

form.addEventListener("submit",e=>{
    if(!checkName(name.value)){
        name.style.setProperty("border","2px solid red");
        e.preventDefault();
    }else{
        name.style.setProperty("border","1px solid #000000");
    }

    if(!checkName(surname.value)){
        surname.style.setProperty("border","2px solid red");
        e.preventDefault();
    }else{
        surname.style.setProperty("border","1px solid #000000");
    }

    if(!checkDate(date.value)){
        date.style.setProperty("border","2px solid red");
        e.preventDefault();
    }else{
        date.style.setProperty("border","1px solid #000000");
    }
    if(!isSelected()){
        sex_man.style.setProperty("border","2px solid red");
        sex_woman.style.setProperty("border","2px solid red");
        e.preventDefault();
    }else{
        sex_man.style.setProperty("border", "1px solid #000000");
        sex_woman.style.setProperty("border", "1px solid #000000");
    }
});


function getData(){
    fetch("/loadData").then(function(response){
        return response.json();
    }).then(function(userData){
        showData(userData)
    });
}

function showData(userData){
    if(!userData['name'])
        name.defaultValue = "Imie";
    else
        name.defaultValue = userData['name'];
    if(!userData['surname'])
        surname.defaultValue = "Nazwisko"
    else
        surname.defaultValue = userData['surname'];
    if(userData['birth_date'])
        birthday.defaultValue = userData['birth_date'];

    if(!userData['weight'])
        weight.defaultValue = 0;
    else
        weight.defaultValue = userData['weight'];
    if(!userData['height'])
        height.defaultValue = 0;
    else
        height.defaultValue = userData['height'];

    if(userData['sex']) {
        if (userData['sex'] === "MALE") {
            sex_woman.checked = false;
            sex_man.checked = true;
        } else if (userData['sex'] === "FEMALE") {
            sex_man.checked = false;
            sex_woman.checked = true;
        }
    }
}
getData();