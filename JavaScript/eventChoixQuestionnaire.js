var oSelect = document.getElementById('domaine');
oSelect.addEventListener('change', function(){
	request(oSelect);
}, true);