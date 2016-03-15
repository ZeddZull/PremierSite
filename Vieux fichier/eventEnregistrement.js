var oSubmit = document.getElementById("envoie");
var oMail = document.getElementById("mail");
var oMdp = document.getElementById("motDePasse");
var oDate = document.getElementById("naissance");

oSubmit.addEventListener("click",testToutEstBon,true);
oMail.addEventListener("change",chekMail,true);
oMdp.addEventListener("change",checkMdp,true);
oDate.addEventListener("change",checkDate,true);