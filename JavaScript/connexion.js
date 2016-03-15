var oNomCompte = document.getElementById("nomDuCompte");
var oMdp = document.getElementById("mdp");

function checkCompte(){
	var nomCompte = oNomCompte.value;

	if(nomCompte){
		var xhr = getXMLTHttpRequest();

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
				actionCheckCompte(xhr.responseText);
			}
		}
		xhr.open("POST","Controleur/RequetesJS/testCompte.php",true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("nomCompte="+nomCompte);
	}
}

function actionCheckCompte(tData){
	if (tData == 0) {
		oNomCompte.setCustomValidity("Ce compte n'exite pas");
	} else { 
		oNomCompte.setCustomValidity('');
	}
}

oNomCompte.addEventListener("input",checkCompte);

function checkMdp(){
	var nomCompte = oNomCompte.value;
	var mdp = oMdp.value;

	if(nomCompte){
		var xhr = getXMLTHttpRequest();

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
				actionCheckMdp(xhr.responseText);
			}
		}
		xhr.open("POST","Controleur/RequetesJS/testConnexion.php",true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("nomCompte="+nomCompte+"&mdp="+mdp);
	}
}

function actionCheckMdp(tData){
	if (tData == 0) {
		oMdp.setCustomValidity('Mauvais mot de passe');
	} else { 
		oMdp.setCustomValidity('');
	}
}

oMdp.addEventListener("input",checkMdp);