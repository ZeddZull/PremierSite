var oSelect1 = document.getElementById('questionnaire');
var oSelect2 = document.getElementById('domaine');
var oCharge = document.getElementById('chargement');
oSelect1.addEventListener('change', request1,true);
oSelect2.addEventListener('change', function(){
	request(oSelect2);
},true);
window.onload=function(){
	request1();
};