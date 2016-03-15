var oButtonAjouter = document.getElementById("ajouterTheme");
oButtonAjouter.addEventListener('click',ajouterTheme,true);

var oButtonSupprimer = document.getElementById("supprimerTheme");
oButtonSupprimer.addEventListener('click',suppressionTheme,true);

var oSelectThemeQ = document.getElementById("themeQuestionnaire");
oSelectThemeQ.addEventListener('change',function(){
	gestionThemeQuestionnaire(oSelectThemeQ);
	if (oSelectThemeQ.value == "newThemeQ"){
		réinitialisation();
	} else {
		requeteLierTheme(oSelectThemeQ);
	}
},true);