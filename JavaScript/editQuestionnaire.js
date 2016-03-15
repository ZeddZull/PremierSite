function request1(){
	var oSelect = document.getElementById("questionnaire");
	var value = oSelect.options[oSelect.selectedIndex].value;
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
	xhr.send("param1="+value);
}


function readData1(oData) {
	var oForm = document.getElementById('choixQuestionnaire');
	var oChamps = document.getElementsByTagName('fieldset');
	var questionnaire = oData.getElementsByTagName('questionnaire')[0];
	var questions = oData.getElementsByTagName('question');
	var questionsQ = oData.getElementsByTagName('questionQ');
	var oLegend = document.createElement('legend');
	var oSubmit = document.createElement("input");
	var oChamp,s,oQuestion,oLigne,oCase1,oCase2,oOption;
	var oTableau = document.createElement('table');
	var oTableauQ = document.createElement('table');
	var id = questionnaire.getAttribute('id');

	if (oChamps.length > 1){
		oChamp = oChamps[1];
		oChamp.innerHTML = '';
	} else {
		oChamp = document.createElement('fieldset');
		oChamp.id = "editionQuestionnaire";
	}
	oLegend.textContent="Edition de questionnaire";

	s="<tr><td>Nom questionnaire</td><td><input maxlength=\"42\" id=\"nom\" name=\"nom\" value=\""+questionnaire.getAttribute('name')+"\"/></td></tr>";
	s+="<tr><td>Nombre questions</td><td><input pattern=\"^[1-9][0-9]{0,2}|[0-9][1-9][0-9]|[0-9]{0,2}[1-9]$\" id=\"nbQ\" name=\"nbQ\" value=\""+questionnaire.getAttribute('nbq')+"\" onchange=\"javascript:actualiserQuestion(this)\"/></td></tr>";
	s+="<tr><td>Durée questionnaire</td><td><input pattern=\"[0-9]{0,4}\" id=\"dureeQ\" name=\"dureeQ\" value=\""+questionnaire.getAttribute('duree')+"\"/></td></tr>";
	oTableau.innerHTML=s;
	
	for (var i = 1 ; questionnaire.getAttribute('nbq') >= i; i++) {
		oLigne = document.createElement('tr');
		oQuestion = document.createElement('select');
		oCase1 = document.createElement('td');
		oCase2 = document.createElement('td');

		for (var j = questionsQ.length - 1; j >= 0; j--) {
			oOption = document.createElement('option');
			oOption.value = questionsQ[j].getAttribute('id');
			oOption.textContent = questionsQ[j].getAttribute('intitule');
			if (questions.length >= i){
				if (oOption.value == questions[i-1].getAttribute('id')){
					oOption.selected = true;
				}
			}
			oQuestion.appendChild(oOption);
		};
		oQuestion.id='question'+i;
		oQuestion.name ='question'+i;

		oCase1.textContent="Question n°"+i+" ";

		oLigne.appendChild(oCase1);
		oCase2.appendChild(oQuestion);
		oLigne.appendChild(oCase2);
		oTableauQ.appendChild(oLigne);
	};
	oTableauQ.id="lesQuestions";

	oSubmit.type = 'submit';
	oSubmit.value = 'Envoyer';
	oSubmit.id = 'envoie';

	oChamp.appendChild(oLegend);
	oChamp.appendChild(oTableau);
	oChamp.appendChild(document.createElement('br'));
	oChamp.appendChild(oTableauQ);
	oChamp.appendChild(document.createElement('br'));
	oChamp.appendChild(oSubmit);
	oForm.appendChild(oChamp);
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