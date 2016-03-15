var oSelect1 = document.getElementById('questionnaire');
var oSelect2 = document.getElementById('domaine');
var oCharge = document.getElementById('chargement');
var oNbq = document.getElementById('nbQ');
var oSubmit = document.getElementById("envoie");

oSelect1.addEventListener('change', function(){
	request1();
},true);
oSelect2.addEventListener('change', function(){
	request();
},true);
window.onload = function(){
	request1();
}
oNbq.addEventListener("input",function(){
	actualiserQuestion(oNbq);
},true);
oSubmit.addEventListener("click",testAvantEnvoie,true);