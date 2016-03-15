function request1(){
	var oSelectQ = document.getElementById("questionnaire");
	var questionnaire = oSelectQ.options[oSelectQ.selectedIndex].value;
	var oSelectD = document.getElementById("domaine");
	var domaine = oSelectD.options[oSelectD.selectedIndex].value;
	var xhr = getXMLTHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
			readData1(xhr.responseXML);
			document.getElementById("chargement").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("chargement").style.display = "inline";
		}
	};
	xhr.open("POST","Controleur/RequetesJS/afficherQuestionnaire.php",true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("questionnaire="+questionnaire+"&domaine="+domaine);
}


function readData1(oData) {
	var oForm = document.getElementById('choixQuestionnaire');
	var oSelectQ = document.getElementById("questionnaire");
	var oSelectDo = document.getElementById("domaine");
	var oSelectD = document.getElementById("domaineQ");
	var oChamp = document.getElementById('editionQuestionnaire');
	var questionnaire = oData.getElementsByTagName('questionnaire')[0];
	var questions = oData.getElementsByTagName('question');
	var questionsQ = oData.getElementsByTagName('questionQ');
	var oLegend = oChamp.getElementsByTagName('legend')[0];
	var oSubmit = document.createElement("input");
	var oSelectQuestion = document.createElement('select');
	var oLien = document.getElementById("suppression") ;
	var oTableau = document.getElementById("infoQuestionnaire");
	var oTableauQ = document.getElementById('lesQuestions');
	var id = questionnaire.getAttribute('id');
	var oNom = document.getElementById("nom");
	var oDuree = document.getElementById("dureeQ");
	var oNbq = document.getElementById("nbQ");

	if (oSelectQ.value != "newQuestionnaire"){
		oSelectDo.value = questionnaire.getAttribute("domaine");
	}

	oLien.href="Controleur/suprimerQuestionnaire.php?id="+oSelectQ.value;

	if (questionnaire.getAttribute('name')){
		oLegend.textContent = "Editon questionnaire";
		oLien.style.display = "inline";
	} else {
		oLegend.textContent = "Nouveau questionnaire";
		oLien.style.display = "none";
	}


	for (var i = 0 ; questionsQ.length > i; i++) {
		oOption = document.createElement('option');
		oOption.value = questionsQ[i].getAttribute('id');
		oOption.textContent = questionsQ[i].getAttribute('intitule');
		oSelectQuestion.appendChild(oOption);
	};

	// Actualisation des infos du questionnaire
	if (questionnaire.getAttribute('name')){
		oNom.value = questionnaire.getAttribute('name');
	} else {
		oNom.value = "";
	}

	if (oSelectQ.value != "newQuestionnaire"){
		oSelectD.value = questionnaire.getAttribute("domaine");
	} else {
		oSelectD.value = oSelectDo.value;
	}

	oNbq.value = questionnaire.getAttribute('nbq');

	if (questionnaire.getAttribute('duree')){
		oDuree.value = questionnaire.getAttribute('duree');
	}

	// Gestion des questions
	oTableauQ.innerHTML="";

	for (var i = 1 ; questionnaire.getAttribute('nbq') >= i; i++) {
		oLigne = document.createElement('tr');
		oQuestion = oSelectQuestion.cloneNode(true);
		oCase1 = document.createElement('td');
		oCase2 = document.createElement('td');

		oQuestion.value = questions[i-1].getAttribute('id');
		oQuestion.id='question'+i;
		oQuestion.name ='question'+i;

		oCase1.textContent="Question n°"+i+" ";

		oLigne.appendChild(oCase1);
		oCase2.appendChild(oQuestion);
		oLigne.appendChild(oCase2);
		oTableauQ.appendChild(oLigne);
	};

}

function actualiserQuestion(oInput){
	if (/^[1-9][0-9]{0,2}|[0-9][1-9][0-9]|[0-9]{0,2}[1-9]$/.test(oInput.value)){
		var oTableau = document.getElementById("lesQuestions");
		var oQuestions = oTableau.getElementsByTagName('select');
		var oQuestion,oLigne,oCase1,oCase2,oBr;
		var nbq = oQuestions.length;
		if (nbq < oInput.value){
			for (var i = nbq+1 ; i <= oInput.value ; i++) {
				oLigne = document.createElement('tr');
				oCase1 = document.createElement("td");
				oCase2 = document.createElement("td");
				oCase1.textContent='Question n°'+i+' ';

				oQuestion = oQuestions[0].cloneNode(true);
				oQuestion.id = 'question'+i;
				oQuestion.name = 'question'+i;
				oQuestion.selectedIndex = null;

				oCase2.appendChild(oQuestion);
				oLigne.appendChild(oCase1);
				oLigne.appendChild(oCase2);
				oTableau.appendChild(oLigne);
			};
		} else {
			for (var i = nbq ; i > oInput.value; i--) {
				oTableau.removeChild(oTableau.lastChild);
			};
		}
	}
}
function request(){
	var oSelect = document.getElementById("domaine");
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
	var oOption;

	oSelect.innerHTML='';
	for (var i=0; nodes.length > i;i++) {
		oOption = document.createElement("option");
		oOption.value = nodes[i].getAttribute("id");
		oOption.textContent= nodes[i].getAttribute("name");
		oSelect.appendChild(oOption);
	}
	request1();
	ajouterOptionNouveau();
}
function ajouterOptionNouveau(){
	var oSelect = document.getElementById('questionnaire');
	var oOption = document.createElement('option');

	oOption.value = "newQuestionnaire";
	oOption.textContent="Nouveau Questionnaire";

	oSelect.appendChild(oOption);
}

function testAvantEnvoie(){
	var oForm = document.getElementById("choixQuestionnaire");
	var oTableau = document.getElementById("lesQuestions");
	var oQuestions = oTableau.getElementsByTagName('select');
	var nbq = document.getElementById("nbQ").value*1;
	var oCaseCheck = document.getElementById('checkNom');
	var lesIds = [];
	var estOk = true;
	var i=0;

	oCaseCheck.innerHTML="";
	while (i < nbq && estOk){
		if(dansTableau(oQuestions[i].value,lesIds)){
			estOk = false;
		} else {
			lesIds.push(oQuestions[i].value);
			i++;
		}
	}
	if (estOk){
		if (document.getElementById("nom").value){
		oForm.submit();
		} else {
			oCaseCheck.textContent="Champ obligatoire"
		}
	} else {
		alert("Les questions doivent être différentes !");
	}
}

function dansTableau(elem,tableau){
	var estDans = false;
	var i = 0;
	while (i < tableau.length && !estDans){
		if (tableau[i] == elem){
			estDans = true;
		} else {
			i++;
		}
	}
	return estDans;
}