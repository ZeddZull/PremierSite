var timeQuestion,timeQuestionnaire;
// Tableau stockant les réponses de l'utilisateur
var reponse = new Array();
// Tableau stockant les temps de réponse
var tempsReponse = new Array();
// Fonction remplaçant les input des réponses par leur valeur
function remplacement(i){
	var oChamps = document.getElementsByTagName('fieldset');
	var oReponse = document.createElement("p");
	var rep = document.getElementById('reponse'+i).value;
	var tempsi= new Date().getTime();

	tempsReponse[i]=tempsi-tempsDebut;
	reponse[i]=rep;
	oChamps[i].removeChild(oChamps[i].lastChild); 
	oChamps[i].removeChild(oChamps[i].lastChild);
	
	oReponse.innerHTML="Votre réponse est : "+rep;
	oReponse.className = 'reponse';
	oChamps[i].appendChild(oReponse);

}
// Fonction gérant l'apparition et la modification des questions
function questionNew(element){
	var i = element.id.slice(8)*1;
	var oNewQuestion = document.createElement('fieldset');
	var oChamps = document.getElementsByTagName('fieldset');
	var oForm = document.getElementById('form1');
	var oOptionNull = document.createElement("option");
	var oLegend,oInput,oTitre,oBouton,oSelect,oOption,oDiv,oLabel,options,ind;
	var j = 0;

	if (timeQuestion){
		clearTimeout(timeQuestion);
	}

	oNewQuestion.className = 'fondModif';
	if (i==0){		// suppression du boutton commencer
		oChamps[0].removeChild(document.getElementById('question0'));
		tempsDebut = new Date().getTime();		// Variable globale (pas de var)
		if (tempsTotale){
		timeQuestionnaire = setTimeout(plusDeTemps,tempsTotale*1000);
		}
	}
	else{		// Remplacement de l'input des réponses par leur valeur
		remplacement(i);
	};
	i+=1;		// Création de la question suivante
	oLegend = document.createElement("legend");
	oTitre = document.createElement("h3");

	oLegend.textContent='Question'+i;
	oTitre.textContent=question[i][0];

	oNewQuestion.appendChild(oLegend);
	oNewQuestion.appendChild(oTitre);

	if (question[i][3]){
		oSelect = document.createElement('select');
		oSelect.id = "reponse"+i;
		oSelect.appendChild(oOptionNull);

		while (question[i][3+j] && j < 5){
			oOption=document.createElement("option");
			oOption.value=question[i][3+j];
			oOption.textContent=question[i][3+j];
			oSelect.appendChild(oOption);
			j++;
		}
		options = oSelect.getElementsByTagName('option');
		ind = Math.floor(Math.random()*options.length);
		oOption=document.createElement('option');
		oOption.value = question[i][1];
		oOption.textContent = question[i][1];
		if (ind+1 == options.length){
			oSelect.appendChild(oOption);
		} else {
			oSelect.insertBefore(oOption,options[ind+1]);
		}
		oNewQuestion.appendChild(oSelect);

	} else {
		oInput = document.createElement("input");
		oInput.type="text";
		oInput.id = "reponse"+i;
		oInput.setAttribute("placeholder","Ecris ici ta réponse !");

		oNewQuestion.appendChild(oInput);
	}
	
	oBouton = document.createElement("input");

	oBouton.type = "button";
	oBouton.id = "question"+i;
	oBouton.value = "Validation";

	oNewQuestion.appendChild(oBouton);	
	oForm.appendChild(oNewQuestion);

	if (i<question.length-1){
		oBouton.addEventListener("click",function(){
			questionNew(oBouton);
		},true);
	}																													
	else{		// cas de la dernière question 
		oBouton.addEventListener("click",function(){
			validation(oBouton);
		},true);
	}

	if (question[i][2]){
		timeQuestion=setTimeout(plusDeTempsQuestion,new Date().getTime()+question[i][2]*1000);
	}
};
// Fonction qui permet de valider les réponses
function validation(element){
	var j = element.id.slice(8)*1;
	var oChamps = document.getElementsByTagName('fieldset'); 
	var oChamp = document.createElement('fieldset');
	var oForm = document.getElementById('form1');
	var oSubmit = document.createElement('input');
	var oDetail = document.createElement('input');
	var oTexte = document.createElement('p');
	var texte;
	var cpt,nodeVal;

	if (timeQuestion){
		clearTimeout(timeQuestion);
	}
	if (timeQuestionnaire){
		clearTimeout(timeQuestionnaire);
	}
	remplacement(j);
	cpt = 0;
	for (var i = j; i >= 1; i--) {
		if (typeof(reponse[i]) != 'undefined'){
			nodeVal = document.createElement('div');
			if (reponse[i].toLowerCase()==question[i][1]){
				cpt += 1;
				nodeVal.className='valide';
				nodeVal.innerHTML='✓';
			}
			else {
				nodeVal.className='invalide';
				nodeVal.innerHTML='×';
			};
			oChamps[i].insertBefore(nodeVal,oChamps[i].lastChild);
		};
	};
	// creation et insertion du oChamps contenant les resultas 
	if (cpt == 0){
		texte = "aucune question";
	} else {
		if (cpt == 1){
			texte = "une seule question";
		} else {
			texte = cpt+" questions";
		}
	}
	oTexte.textContent="Vous avez répondu correctement à "+texte+" sur "+(question.length-1)+" questions en "+Math.round(tempsReponse[question.length-1]/1000)+" secondes";

	oDetail.type='button';
	oDetail.value='Plus de détails ?';
	oDetail.addEventListener('click',afficherTemps,true);

	oSubmit.type='submit';
	oSubmit.value='Envoyer';

	oChamp.appendChild(oTexte);
	creerInput(cpt,"bonneReponse",oChamp);
	creerInput(Math.round(tempsReponse[question.length-1]/1000),"tempsReponse",oChamp);
	oChamp.appendChild(oSubmit);
	oChamp.appendChild(oDetail);
	oForm.appendChild(oChamp);
};
// Fonction affichant le temps pour chaque question
function afficherTemps(){
	var oChamps = document.getElementsByTagName('fieldset');
	var oDernierChamp = document.getElementById('form1').lastChild;
	var tmp;

	for (var i = tempsReponse.length - 1; i >= 1; i--) {
		tmp = document.createElement('div');
		tmp.className='temps';
		if (i==1){
			tmp.innerHTML="Vous avez mis "+(tempsReponse[i]/1000) +" secondes pour répondre à cette question";
		}else{
			tmp.innerHTML="Vous avez mis "+((tempsReponse[i]-tempsReponse[i-1])/1000) + " secondes pour répondre à cette question";
		}
		oChamps[i].appendChild(tmp);
	};
	oDernierChamp.removeChild(oDernierChamp.lastChild);
}

// Fonction creant des inputs invisible pour transmettre les resultat via le formulaire:D
function creerInput(valeur,nom,oChamp){
	var oInput = document.createElement('input');

	oInput.name = nom;
	oInput.type='text';
	oInput.value=valeur;
	oInput.style.display='none';
	oChamp.appendChild(oInput);
}

function plusDeTemps(){
	alert("Temps écoulé");
	validation(document.getElementById('form1').lastChild.lastChild);

}

function plusDeTempsQuestion(){
	var oChamp = document.getElementById('form1').lastChild.lastChild;
	var i = oChamp.id.slice(-1)*1;
	var oTexte = document.createElement('p');

	if(i<question.length-1){
	questionNew(oChamp);
	}else{
		validation(oChamp);
	}

	oTexte.textContent = " Temps écoulée ! "
	oChamp.appendChild(oTexte);
}
