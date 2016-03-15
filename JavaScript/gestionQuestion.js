function requeteLierTheme(oSelectTheme){
	var value = oSelectTheme.options[oSelectTheme.selectedIndex].value;
	var xhrLieTheme = getXMLTHttpRequest();

	xhrLieTheme.onreadystatechange = function() {
		if (xhrLieTheme.readyState == 4 && (xhrLieTheme.status == 200 || xhrLieTheme.status == 0)){
			lireDonnees(xhrLieTheme.responseXML);
			document.getElementById("chargement").style.display = "none";
		} else if (xhrLieTheme.readyState < 4) {
			document.getElementById("chargement").style.display = "inline";
		}
	};

	xhrLieTheme.open("POST","Controleur/RequetesJS/gestionThemeQuestion.php",true);
	xhrLieTheme.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrLieTheme.send("theme="+value);
}

function lireDonnees(oDonnees){
	var oSelectQ = document.getElementById('questions');
	var questions= oDonnees.getElementsByTagName('item');
	var oOption;

	oSelectQ.innerHTML='';
	for (var i = 0; i < questions.length; i++) {
		oOption=document.createElement('option');

		oOption.value=questions[i].getAttribute('id');
		oOption.textContent=questions[i].getAttribute('name');

		oSelectQ.appendChild(oOption);
	};
	requeteLierQuestion(oSelectQ);
}

function loadChoix(){
	var oTableau=document.getElementById("infoQuestion");
	var oLigne,oCase1,oCase2,oInput;

	for (var i = 0; i<5 ; i++) {
		oLigne=document.createElement('tr');
		oCase1=document.createElement('td');
		oCase2=document.createElement('td');
		oInput=document.createElement('input');

		oInput.type='text';
		oInput.name='choix'+(i+1);
		oInput.id = "choix"+(i+1);
		if (i==0){
			oInput.required=true;
		}
		oCase1.textContent='Choix n°'+(i+1);

		oCase2.appendChild(oInput);
		oLigne.appendChild(oCase1);
		oLigne.appendChild(oCase2);
		oTableau.appendChild(oLigne);
	};
}

function unloadChoix(){
	var oTableau=document.getElementById("infoQuestion");
	for (var i = 5; i > 0; i--) {
		oTableau.removeChild(oTableau.lastChild);
	};
}

function requeteLierQuestion(oSelectQ){
	var value = oSelectQ.options[oSelectQ.selectedIndex].value;
	var xhrLieQ = getXMLTHttpRequest();

	xhrLieQ.onreadystatechange = function() {
		if (xhrLieQ.readyState == 4 && (xhrLieQ.status == 200 || xhrLieQ.status == 0)){
			lireDonneesQ(xhrLieQ.responseXML);
			document.getElementById("chargement").style.display = "none";
		} else if (xhrLieQ.readyState < 4) {
			document.getElementById("chargement").style.display = "inline";
		}
	};

	xhrLieQ.open("POST","Controleur/RequetesJS/gestionQuestion.php",true);
	xhrLieQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrLieQ.send("id="+value);
}

function lireDonneesQ(oDonnees){
	var question = oDonnees.getElementsByTagName("question")[0];
	
	document.getElementById("themeQuestion").value = question.getAttribute("domaine");

	document.getElementById("question").value = question.getAttribute("nom");

	document.getElementById("reponse").value = question.getAttribute("reponse");

	document.getElementById("duree").value = question.getAttribute("duree");

	document.getElementById("domaine").value = question.getAttribute("domaine");

	if (question.getAttribute("choix1")) {
		if (!document.getElementById("forme").checked){
			document.getElementById("forme").checked = true;
			loadChoix();
		}
		for (var i = 1; i < 6; i++) {
			document.getElementById("choix"+i).value=question.getAttribute("choix"+i);
		};
	}
}
