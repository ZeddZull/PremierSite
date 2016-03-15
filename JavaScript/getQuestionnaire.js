function request(oSelect){
	var value = oSelect.options[oSelect.selectedIndex].value;
	var xhr = getXMLTHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
			readData(xhr.responseXML);
			document.getElementById("chargement").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("chargement").style.display = "inline";
		}
	};
	xhr.open("POST","Controleur/RequetesJS/choixQuestionnaire.php",true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("questionnaire="+value);
}

function readData(oData,idSelect) {
	var nodes = oData.getElementsByTagName("item");
	var oSelect = document.getElementById('questionnaire');
	var oTest = document.getElementById('envoie');
	var oOption;

	oSelect.innerHTML='';
	for (var i=0; nodes.length > i;i++) {
		oOption = document.createElement("option");
		oOption.value = nodes[i].getAttribute("id");
		oOption.textContent= nodes[i].getAttribute("name");
		oSelect.appendChild(oOption);
	}
}
