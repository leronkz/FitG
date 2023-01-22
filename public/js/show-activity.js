const activityDate = document.querySelector("#activity-date");
const dateBtn = document.querySelector("#search-activity");
const activityPanel = document.querySelector(".show-activity");
const spinner = document.querySelector("#spinner");

function searchTraining(){
    activityPanel.innerHTML="";
    const data = {date:activityDate.value};
    spinner.removeAttribute('hidden');
    fetch("/showTraining",{
        method: "POST",
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function(response){
        return response.json();
    }).then(function(activity){
        spinner.setAttribute('hidden','');
        showTraining(activity);
    });
}

dateBtn.addEventListener("click",searchTraining);

function showTraining(activity) {
    activity.forEach((exercise)=>{
        let exerciseName = exercise.exercise_name;
        let series = exercise.number_of_series;
        const activityDiv = document.createElement("div");
        activityDiv.className = "activity";
        const table = document.createElement("table");
        const n = document.createElement("b");
        n.className = "text";
        n.innerText = exerciseName;
        let thTag="";
        let tdTag="";
        for(let i=0; i<=series; i++){
            const row = document.createElement("tr");
            if(i===0){
                thTag+=`<th>Seria</th>`;
                thTag+=`<th>Ciężar</th>`;
                thTag+=`<th>Ilość pow.</th>`;
                row.innerHTML = thTag;
                table.appendChild(row);
            }
            else{
                let weight = "s_weight"+i;
                let reps = "s_reps"+i;
                tdTag+=`<td>${i} seria</td>`;
                tdTag+=`<td>${exercise[weight]} kg</td>`;
                tdTag+=`<td>${exercise[reps]}</td>`;
                row.innerHTML = tdTag;
                table.appendChild(row);
                tdTag="";
            }
        }
        activityDiv.appendChild(n);
        activityDiv.appendChild(table);
        activityPanel.appendChild(activityDiv);
    })

}