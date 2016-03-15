<form>
	<fieldset id="affichageReponse">
		<h2>Derniers questionnaires effectués</h2>
		<br>
		<table id="resultats">
			<tr>
				<th>Questionnaire</th>
				<th>Résultat</th>
				<th>Temps</th>
				<th>Date</th>
			</tr>
						<?php $i = count($reponses)-1;
					while ($i >= count($reponses)-11 and $i >= 0) {
						$duree=$reponses[$i]->getDuree();
						$dureeM=($duree-$duree%60)/60;
						$dureeS=$duree%60;
						$dureeA=(($dureeM) ? $dureeM." m" : "").(($dureeS and $dureeM) ? " : ":"").(($dureeS)?$dureeS." s": "");
						echo "<tr><td> ".$reponses[$i]->getNomQuestionnaire()." </td><td> ".$reponses[$i]->getResultat()." / ".$questionnaires[$reponses[$i]->getIdQuestionnaire()]->getNombreQuestions()." </td><td> ".$dureeA." </td><td>".$reponses[$i]->getDate()."</td></tr>";
						$i-=1;
					}
				?>
		</table>
		<br>
	</fieldset>
</form>