var oNomCompte = document.getElementById("nomCompte");
var oMail = document.getElementById("mail");

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
		oNomCompte.setCustomValidity('');
	} else { 
		oNomCompte.setCustomValidity('Ce Compte éxiste déjà');
	}
}

oNomCompte.addEventListener("input",checkCompte);

function checkMail(){
	var mail = oMail.value;

	if(mail){
		var xhr = getXMLTHttpRequest();

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
				actionCheckMail(xhr.responseText);
			}
		}
		xhr.open("POST","Controleur/RequetesJS/testMail.php",true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("mail="+mail);
	}
}

function actionCheckMail(tData){
	if (tData == 0) {
		oMail.setCustomValidity('');
	} else { 
		oMail.setCustomValidity('Cette email est déjà utilisé');
	}
}

oMail.addEventListener("input",checkMail);