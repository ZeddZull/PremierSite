var elem = document.getElementById('forme');
var oSelectT = document.getElementById('themeQuestion');
var oSelectQ = document.getElementById("questions");
var oLien = document.getElementById("lienS");

oSelectQ.addEventListener("change",function(){
	requeteLierQuestion(oSelectQ);
	if (oSelectQ.value != "newQuestion"){
	oLien.href="Controleur/suppresionQuestion.php?id="+oSelectQ.value;
	oLien.textContent="Supprimer cette question";
	} else {
		oLien.textContent = "";
	}
},true);

oSelectT.addEventListener('change',function(){
	requeteLierTheme(oSelectT);
	document.getElementById('domaine').value=oSelectT.value;
},true);

elem.addEventListener('click',function(){
	if (this.checked) {
		loadChoix();
	} else {
		unloadChoix();
	}
});

