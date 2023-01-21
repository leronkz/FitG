const registeredUsers = document.querySelector("#registered-users");
function getUsers(){
    fetch("/getUsers").then(function(response){
        return response.json();
    }).then(function(users){
       showUsers(users);
    });
}
function showUsers(users) {
    if(users == null){
        registeredUsers.innerText = 0;
    }else {
        registeredUsers.innerText = users.length;
    }
}
getUsers();

const deleteBtns = document.querySelectorAll("#delete-button");

function deleteUser(){
    let emailFld = this.parentElement.querySelector("#email").innerText;
    let data = {email: emailFld};
    fetch("/toDelete",{
        method: "POST",
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function(response){
        return response.json();
    });

    setInterval('location.reload()',200);
}

function createListeners(){
    for(let i=0; i<deleteBtns.length; i++){
        deleteBtns[i].addEventListener("click",deleteUser);
    }
}

createListeners();



