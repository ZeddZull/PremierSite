function gestionThemeQuestions(oSelect){
	var id = oSelect.id.slice(13);
	var oCase =document.getElementById("case"+id);
	var oInput;

	if (oSelect.value != "newTheme") {
		oInput=document.getElementById("newTheme"+id);
		if (oInput){
			oCase.removeChild(oInput);
		}
	} else {
		oInput=document.createElement("input");
		oInput.type="text";
		oInput.id="newTheme"+id;
		oInput.name="newTheme"+id;
		oInput.placeholder="Ici notez votre thème";
		oCase.appendChild(oInput);
	}
}

function ajouterTheme(){
	var oSelects = document.getElementsByTagName('select');
	var oSelect = oSelects[oSelects.length -1]
	var id = oSelect.id.slice(13)*1+1;
	var oTableau = document.getElementById('themesQuestions');
	var oCase1 = document.createElement('td');
	var oCase2 = document.createElement("td");
	var oLigne = document.createElement("tr");
	var oInput = document.createElement('input');
	var oSelectT = oSelect.cloneNode(true);

	oSelectT.value = "newTheme";
	oSelectT.id = "themeQuestion"+id;
	oSelectT.name = "themeQuestion"+id;

	oInput.type="text";
	oInput.name = "newTheme"+id;
	oInput.id = "newTheme"+id;
	oInput.placeholder="Ici notez votre thème";

	oCase2.id = "case"+id;
	
	oCase1.appendChild(oSelectT);
	oCase2.appendChild(oInput);
	oLigne.appendChild(oCase1);
	oLigne.appendChild(oCase2);
	oTableau.appendChild(oLigne);
}

function suppressionTheme(){
	var oTableau=document.getElementById("themesQuestions");
	var oSelects = oTableau.getElementsByTagName('select');
	if (oSelects.length > 1){	
		oTableau.removeChild(oTableau.lastChild);
	}
}

// xhrLieTheme est un objet

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

	xhrLieTheme.open("POST","Controleur/RequetesJS/gestionTheme.php",true);
	xhrLieTheme.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhrLieTheme.send("themeQ="+value);
}

function lireDonnees(oDonnees){
	// alert(oDonnees.getElementsByTagName('item')[0].getAttribute('theme'))
	var themes = oDonnees.getElementsByTagName('item');
	var oTableau = document.getElementById('themesQuestions');
	var oSelect;

	for (var i = 0; themes.length > i; i++) {
		if (oTableau.getElementsByTagName('select').length < i+2){
			ajouterTheme();
		}
		else {
			if (oTableau.getElementsByTagName('select').length > i+2){
				suppressionTheme();
			}
		}
		oSelect=document.getElementById('themeQuestion'+(i+1));
		oSelect.value=themes[i].getAttribute('theme');
		document.getElementById("case"+(i+1)).innerHTML="";

		if ( i == themes.length - 1){
			suppressionTheme();
			ajouterTheme();
		} 
	};

}

function gestionThemeQuestionnaire(oSelect){
	var oChamp = document.getElementById("themeQuestionnaireF");
	var oInput;
	if (oSelect.value != 'newThemeQ'){
		oInput=document.getElementById("newThemeQ");
		if (oInput){
			oChamp.removeChild(oInput);
		}
	} else {
		oInput=document.createElement("input");
		oInput.type="text";
		oInput.id="newThemeQ";
		oInput.name="newThemeQ";
		oInput.placeholder="Ici notez votre thème";
		oChamp.appendChild(oInput);
	}
}

function réinitialisation(){
	var selecteurs = document.getElementById("themesQuestions").getElementsByTagName("select");
	for (var i = selecteurs.length - 1; i > 0; i--) {
		suppressionTheme()
	};
	selecteurs[0].value="newTheme";
	gestionThemeQuestions(selecteurs[0]);
}