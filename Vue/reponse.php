<form id='form1' action='Controleur/reponse.php' method='POST'>
	<fieldset class='fondModif'>
		<legend>Information questionnaire</legend>
		<p>Ce questionnaire comporte <?php echo $questionnaire->getNombreQuestions(); ?> questions <?php if ($duree) { echo "pour une durée de ".(($duree-$duree%60)/60)." minutes"; if ($duree%60){echo " et ".($duree%60)." secondes.";} else {echo ".";}} ?></p>
		<p>Attention lorsque vous validez une question vous ne pourrez plus modifier la réponse ! </p>
		<input type='button' id="question0" value = 'Commencer' onclick="javascript:questionNew(this);" />
	</fieldset>
</form>
<script type="text/javascript" src="JavaScript/reponse.js"></script>