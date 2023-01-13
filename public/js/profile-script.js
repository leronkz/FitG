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

    // let input = birthday.value;
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
    if(num.length===0)
        return true;
    if(num.valueAsNumber<0)
        return false;
}

function isSelected(){
    if(!sex_man.checked && !sex_woman.checked)
        return false;
}

form.addEventListener("submit",e=>{
    let t;

    if(!checkName(name.value)){
        name.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }else{
        t = true;
    }

    if(t)
        name.style.setProperty("border","1px solid #000000");

    if(!checkName(surname.value)){
        surname.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }else{
        t = true;
    }

    if(t)
        surname.style.setProperty("border","1px solid #000000");

    if(!checkDate(date.value)){
        date.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }else{
        t = true;
    }
    if(t)
        date.style.setProperty("border","1px solid #000000");

    if(!isNumber(weight.value)){
        weight.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }else{
        t = true;
    }
    if(t)
        weight.style.setProperty("border","1px solid #000000");

    if(!isNumber(height.value)){
        height.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }else{
        t = true;
    }
    if(t)
        height.style.setProperty("border","1px solid #000000");

    if(!isSelected()){
        sex_man.style.setProperty("border","2px solid red");
        sex_woman.style.setProperty("border","2px solid red");
        t = false;
        e.preventDefault();
    }
    if(t) {
        sex_man.style.setProperty("border", "1px solid #000000");
        sex_woman.style.setProperty("border", "1px solid #000000");
    }
});