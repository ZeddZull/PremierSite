<aside>
	<div>
		<h3>Questionnaires récents</h3>
		<ul>
		<?php
		$i=0;
		while ($i < 10 and $i<count($idQuestionnaires)) {
			echo '<li><a href="Controleur/redirectionReponse.php?id='.$idQuestionnaires[$i].'" >'.$questionnaires[$idQuestionnaires[$i]]->getNom().'</a></li>';
			$i+=1;
		}
		?>
		</ul>
		<h3>Questionnaires populaire</h3>
		<ul>
		<?php
		$i=0;
		while ($i < 10 and $i<count($idQuestionnairesPop)) {
			echo '<li><a href="Controleur/redirectionReponse.php?id='.$idQuestionnairesPop[$i].'" >'.$questionnaires[$idQuestionnairesPop[$i]]->getNom().'</a></li>';
			$i+=1;
		}
		?>
		</ul>

	</div>
</aside>