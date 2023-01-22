const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '70043c4b8amsh2eadfa1cc6c11f2p1433f9jsnba6274dcc502',
		'X-RapidAPI-Host': 'exercisedb.p.rapidapi.com'
	}
};

let exerciseNames = [];
const inputEl = document.querySelector("#autocomplete-input");
const addElementBtn = document.querySelector("#add-activity-button");
const nextBtn = document.querySelector("#next-button");
const entryPanel = document.querySelector(".entry");
const activityPanel = document.querySelector(".activity-panel");
const saveExerciseBtn = document.querySelector("#save-exercise");
const popUp = document.querySelector(".popup");
const showActivity = document.querySelector(".show-activity");
const closeBtn = document.querySelector("#popup-close");

const saveTrainingBtn = document.querySelector(".save-button");

// async function getExerciseData(){
// 	const exerciseRes = await fetch('https://exercisedb.p.rapidapi.com/exercises', options);
// 	const data = await exerciseRes.json();
// 	exerciseNames = data.map((exercise)=>{
// 		const n = exercise.name;
// 		const str = n.charAt(0).toUpperCase()+n.slice(1);
// 		return str;
// 	});
// }

// getExerciseData();

// function onInputChange(){
// 	removeAutocompleteDropdown();
// 	const value = inputEl.value.toLowerCase();

// 	if(value.length===0) return;
// 	const filteredNames = [];
// 	exerciseNames.forEach((exerciseName) =>{
// 		if(exerciseName.substr(0, value.length).toLowerCase() === value)
// 			filteredNames.push(exerciseName);
// 	})
// 	createAutocompleteDropdown(filteredNames);
// }
// inputEl.addEventListener("input", onInputChange);

// function createAutocompleteDropdown(list){

// 	const listEl = document.createElement("ul");
// 	listEl.className = "autocomplete-list";
// 	listEl.id = "autocomplete-list";
// 	list.forEach((exercise)=>{
// 		const listItem = document.createElement("li");
// 		const exerciseButton = document.createElement("button");
// 		exerciseButton.innerHTML = exercise;
// 		exerciseButton.addEventListener("click",onExerciseButtonClick);
// 		listItem.appendChild(exerciseButton);
// 		listEl.appendChild(listItem);
// 	})
// 	document.querySelector("#autocomplete-wrapper").appendChild(listEl);
// }

// function removeAutocompleteDropdown(){
// 	const listEl = document.querySelector("#autocomplete-list");
// 	if(listEl)
// 		listEl.remove();
// }

// function onExerciseButtonClick(e){
// 	e.preventDefault();
// 	const buttonEl = e.target;
// 	inputEl.value = buttonEl.innerHTML;
// 	removeAutocompleteDropdown();
// }

addElementBtn.addEventListener("click",onAddExerciseButtonClick);
function onAddExerciseButtonClick(){
	addElementBtn.style.setProperty("visibility","hidden");
	popUp.style.setProperty("visibility","visible");
}

function createEntries(seriesCounter){

	let divTag = "";
	for(let i=1; i<=seriesCounter; i++){
		const entry = document.createElement("div");
		entry.className = "entry-id";
		entry.id="entry-id-"+i;
		divTag+=`<p>${i}</p>`;
		divTag+=`<input class="entries-input" type="number" placeholder="kg"></input>`
		divTag+=`<input class="entries-input" type="number" placeholder="reps">`
		entry.innerHTML = divTag;
		entryPanel.appendChild(entry);
		divTag="";
	}
}

function onNextButtonClick(){
	inputEl.readOnly = true;
	const exerciseName = inputEl.value;
	let series = document.querySelector("#series");
	const numberOfSeries = series.options[series.selectedIndex].value;
	console.log(exerciseName);
	if(exerciseName.length === 0){
		inputEl.style.setProperty("border","2px solid red");
		alert("Uzupełnij wszystkie pola");
	}
	else{
		inputEl.style.setProperty("border","1px solid #000000");
		let header = document.querySelector(".entry-header");
		header.style.setProperty("visibility","visible");
		createEntries(Number(numberOfSeries));
		let saveExerciseBtn = document.querySelector("#save-exercise");
		saveExerciseBtn.style.setProperty("visibility","visible");
		nextBtn.disabled= true;
	}
}
nextBtn.addEventListener("click",onNextButtonClick);


function onSaveExerciseButtonClick(){
	const exerciseName = inputEl.value;
	let series = document.querySelector("#series");
	const numberOfSeries = Number(series.options[series.selectedIndex].value);
	const activity = document.createElement("div");
	activity.className="activity";
	const table = document.createElement("table");
	const n = document.createElement("b");
	n.className="text";
	n.innerText=exerciseName;
	let thTag="";
	let tdTag="";
	let t = true;
	for(let i = 0; i<=numberOfSeries; i++){
		const row = document.createElement("tr");
		if(i===0){
			thTag+=`<th>Seria</th>`;
			thTag+=`<th>Ciężar</th>`;
			thTag+=`<th>Ilość pow.</th>`;
			row.innerHTML = thTag;
			table.appendChild(row);
		}
		else{
			let gotRow = document.querySelector("#entry-id-"+i);
			var values = gotRow.getElementsByTagName("input");
			for(let i=0; i<values.length; i++){
				if(values[i].value.length===0 || values[i].valueAsNumber<0){
					values[i].style.setProperty("border","2px solid red");
					t = false;
				}else{
					values[i].style.setProperty("border","1px solid #000000");
				}
			}
			if(t){
				tdTag+=`<td>${i} seria</td>`;
				tdTag+=`<td>${values[0].value} kg</td>`;
				tdTag+=`<td>${values[1].value}</td>`;
				row.innerHTML = tdTag;
				table.appendChild(row);
				tdTag="";
			}
		}
	}
	if(t){
		activity.appendChild(n);
		activity.appendChild(table);
		showActivity.appendChild(activity);
		popUp.style.setProperty("visibility","hidden");
		saveExerciseBtn.style.setProperty("visibility","hidden");
		let header = document.querySelector(".entry-header");
		header.style.setProperty("visibility","hidden");
		addElementBtn.style.setProperty("visibility","visible");
		inputEl.readOnly = false;
		resetPopUp();
	}else{
		alert("Uzupełnij prawidłowo wszystkie pola");
	}
}
saveExerciseBtn.addEventListener("click",onSaveExerciseButtonClick);

function resetPopUp(){
	while(entryPanel.lastChild){
		if(entryPanel.lastChild.id === "entry-header")
			break;
		entryPanel.removeChild(entryPanel.lastChild);
	}
	let form = document.querySelector(".add-form");
	nextBtn.disabled = false;
	form.reset();
}

closeBtn.addEventListener("click",closePopUp);

function closePopUp(){
	popUp.style.setProperty("visibility","hidden");
	saveExerciseBtn.style.setProperty("visibility","hidden");
	let header = document.querySelector(".entry-header");
	header.style.setProperty("visibility","hidden");
	inputEl.readOnly = false;
	resetPopUp();
	addElementBtn.style.setProperty("visibility","visible");
}

saveTrainingBtn.addEventListener("click",sendData);

function sendData(){
	const listItems = showActivity.children;

	const data = {};
	let ex = [];
	data["date"] = document.querySelector(".current-date").innerText;
	let tag;
	for (let i = 0; i < listItems.length; i++) {
		let n = listItems[i].firstElementChild.innerText;
		ex.push(n);
		let tds = listItems[i].getElementsByTagName("td");
		for (let j = 0; j < tds.length; j++) {
			ex.push(tds[j].innerText);
		}
		tag = "exercise"+i;
		data[tag] = ex;
		ex = [];
	}
	showActivity.innerHTML = "";
	fetch("/sendData",{
		method: "POST",
		headers:{
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data)
	});
}

