function testToutEstBon(){
	var nomCompte = document.getElementById("nomCompte").value;
	var mdp = document.getElementById("checkMdp").textContent;
	var mail = document.getElementById("checkMail").textContent;
	var dateN = document.getElementById("checkDate").textContent;

	if (mdp == "Valide" && mail == "Valide" && dateN == "Valide"){
		if(nomCompte){
			var xhr = getXMLTHttpRequest();

			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
					envoieForm(xhr.responseText);
				}
			}
			xhr.open("POST","Controleur/RequetesJS/testCompte.php",true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("nomCompte="+nomCompte);
			
		} else {
			document.getElementById("checkCompte").innerHTML = "Champ obligatoire";
		}
	}
}

function envoieForm(tData){
	if (tData) {
		document.getElementById("checkCompte").innerHTML = "Compte existant";
	} else {
		document.getElementById("enregistrement").submit();
	}
}

function chekMail(){
	var mail = document.getElementById("mail").value;
	var mailC = document.getElementById("checkMail");
	if (/^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/.test(mail)){
		mailC.innerHTML = "Valide";
	} else {
		mailC.innerHTML = "Non Valide";
	}
}

function checkMdp(){
	var mdp = document.getElementById("motDePasse").value;
	var mdpC = document.getElementById("checkMdp");
	if (/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test(mdp)){
		mdpC.innerHTML = "Valide";
	} else {
		mdpC.innerHTML = "Non Valide";
	}	
}

function checkDate(){
	var date = document.getElementById("naissance").value;
	var dateC = document.getElementById("checkDate");
	if (date.pattern){
		dateC.innerHTML = "Valide";
	} else {
		dateC.innerHTML = "Non Valide";
	}		
}