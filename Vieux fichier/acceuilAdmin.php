<nav>
	<div class='grandEcran'>
		<ul>
			<li><a href="Controleur/question.php">Gestion question</a></li>
			<li><a href="Controleur/gestionQuestionnaire.php">Gestion questionnaire</a></li>
			<li><a href="Controleur/gestionTheme.php">Gestion des thèmes</a></li>
			<li><a href="Controleur/reinitialisation.php">Se deconnecter</a></li>
		</ul>
	</div>
	<div class='petitEcran'>
		<form id="selectionPage" action='Controleur/redirection.php' method="POST">
			<select name="selectionPage">
				<option>Menu du site</option>
				<option value="question.php">Nouvelle question</option>
				<option value="editerQuestionnaire.php">Gestion questionnaire</option>
				<option value="gestionTheme.php">Gestion des thèmes</option>
				<option value="reinitialisation.php">Se deconnecter</option>
			</select>
		</form>
	</div>
</nav>
<script>
var oFormE=document.getElementById('selectionPage');
oFormE.addEventListener("change",function(){
	oFormE.submit();
},true);
</script>