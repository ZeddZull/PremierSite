<?php
session_start();
date_default_timezone_set('Europe/Paris');
include_once("Modele/Global.php");
include("Vue/header.php");
$bdd = new BaseDeDonnees;
if (!isset($_SESSION['user']) and (!isset($_SESSION['page']))){
	include("Vue/connexion.php");
}
else{
	if (!isset($_SESSION['user'])){
		include("Vue/enregistrement.php");
	}
	else{
		$user=new User($_SESSION['user']);
		if ($user->getTypeCompte()=="Admin"){
		// Partie admin du site
			$_SESSION['admin']=true;
			include("Vue/acceuil.php");
			echo "<section>";
			echo '<div id="contenue">';
			if (isset($_SESSION['message'])){
				echo "<header><h3>".$_SESSION['message']."</h3></header>";
				unset($_SESSION['message']);
		}
			if (isset($_SESSION['page'])){
				switch ($_SESSION['page']){
					case 'question':
						$domaines=$bdd->getDomainesQuestions();
						$questions=getToutesLesQuestions();                                                
						include("Vue/question.php");
						break;
					case 'editerQuestionnaire':
						$questionnaires=getQuestionnaires();
						$domaines=$bdd->getDomaine();
						include("Vue/gestionQuestionnaire.php");
						break;
					case 'gestionTheme':
						$themesQuestionnaires=$bdd->getDomaine();
						$themesQuestions=$bdd->getDomainesQuestions();
						include("Vue/gestionTheme.php");
						break;

				}
			}
		}	
		else{
		// Partie utilisateur
			$_SESSION['admin']=false;
			include_once("Vue/acceuil.php");
			echo "<section>";
			echo '<div id="contenue">';
			if (isset($_SESSION['message'])){
				echo "<header><h3>".$_SESSION['message']."</h3></header>";
				unset($_SESSION['message']);
		}
		}
		// Partie commune
		if(isset($_SESSION['page'])){
			// Selection des pages (explicite)
			switch ($_SESSION['page']){
				case 'reponse';
					if (isset($_SESSION['idQ'])){
						$questionnaire = new Questionnaire($_SESSION['idQ']);
						$questions = $questionnaire->getQuestions();
						$duree=$questionnaire->getDuree();
						// Transmission du tableau question/reponse ( comme j'ai pus Oo)
						?><script type="text/javascript">var question=new Array();var i=1;var tempsTotale='<?php echo $questionnaire->getDuree()?>'</script><?php
						foreach ($questions as $question) {
							?><script type="text/javascript">
							question[i]=['<?php echo $question->getQuestion();?>','<?php echo $question->getReponse()?>','<?php echo $question->getDuree()?>','<?php echo $question->getChoix1()?>','<?php echo $question->getChoix2()?>','<?php echo $question->getChoix3()?>','<?php echo $question->getChoix4()?>','<?php echo $question->getChoix5()?>'];
							i++;
						</script><?php
						}
						include("Vue/reponse.php");
					}
					break;
				case 'choixQuestionnaire';
					$questionnaires=getQuestionnaires();
					$domaines=$bdd->getDomaine();
					include("Vue/choixQuestionnaire.php");
					break;
				case "gestionCompte";
					echo '<section id="gestionCompte">';
					include("Vue/gestionCompte.php");
					// selection des "sous" pages
					if (isset($_SESSION['sousPage'])){
						switch ($_SESSION['sousPage']) {
							case "modifMdp":
								include("Vue/GestionCompte/motDePasse.php");
								break;
							case "modifMail":
								include("Vue/GestionCompte/mail.php");
								break;
							case "modifInfo":
								include("Vue/GestionCompte/information.php");
								break;
							}
						}
						if(isset($_SESSION['messagec'])){
							echo "<h2>".$_SESSION['messagec']."</h2>";
							unset($_SESSION['messagec']);
						}
					echo "</section>";
			}
		} else {
			// Page d'acceuil, Dernier résultats
			$questionnaires = getQuestionnaires();
			$reponses=getReponsesUser($user->getNomCompte());
			include("Vue/affichageReponse.php");
		}
		echo "</div>";
		// aside, selections de questionnaires
		$idQuestionnaires = $bdd->getLesQuestionnairesRecent();
		$questionnaires = getQuestionnaires();
		$idQuestionnairesPop = getQuestionnairesPop();
		include("Vue/asideQuestionnaire.php");
	}
echo "</section>";
}

include("Vue/footer.php");
