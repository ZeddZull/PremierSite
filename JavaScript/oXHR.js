function getXMLTHttpRequest() {
	var xhr = null;
	if (window.XMLHttpRequest || window.ActiveXObject){
		if (window.ActiveXObject){
			try {
				xhr = new ActiveXObject('Msxml2.XMLHTTP');
			} catch(e) {
				xhr = ActiveXObject('Microsoft.XMLHTTP');
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne support pas l'objet XMLHttpRequest !");
	}
	return xhr;
}