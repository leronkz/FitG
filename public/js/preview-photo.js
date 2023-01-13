const imgDiv = document.querySelectorAll(".picture");
const img = document.querySelector("#photo");
const file = document.querySelector("#change-picture-input");

file.addEventListener('change',function(){
    const choseFile = this.files[0];
    if(choseFile){
        const reader = new FileReader();
        reader.addEventListener('load',function(){
            imgDiv[1].style.setProperty('background-image',"url('"+reader.result+"')");
            imgDiv[0].style.setProperty('background-image',"url('"+reader.result+"')");
        });
        reader.readAsDataURL(choseFile);
    }
});