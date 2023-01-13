const emailInput = document.querySelector("#email");
const passwordInput = document.querySelector("#password");
const confirmPasswordInput = document.querySelector("#confirm-password");
const form = document.querySelector("form");
function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}
emailInput.addEventListener('keyup',function(){
    setTimeout(function(){
        markValidation(emailInput, isEmail(emailInput.value));
    },1000);
});

confirmPasswordInput.addEventListener('keyup',function(){
   setTimeout(function(){
      const condition =  arePasswordsSame(
        passwordInput.value,
        confirmPasswordInput.value
      );
      markValidation(confirmPasswordInput,condition);
   },1000);
});

form.addEventListener("submit",e=>{
    if(!isEmail(emailInput.value) || !arePasswordsSame(passwordInput.value,confirmPasswordInput.value)){
        alert("Uzupełnij wszystkie pola prawidłowo")
        e.preventDefault();
    }

});

