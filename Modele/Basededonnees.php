<?php  
class BaseDeDonnees {

	private $connexion;

	public function __construct() {
		try{
			require_once("infoCo.php");
			$dsn="mysql:dbname=".BASE.";host=".SERVER;
			$this->connexion=new PDO($dsn,USER,PASSWD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		}catch(PDOException $e){
			printf("Échec de la connexion : %s\n", $e->getMessage());
			exit();
		}
	}

	public function createUser($nomCompte,$motDePasse,$mail,$nom,$prenom,$naissance){
		$insert = $this->connexion->prepare('INSERT INTO Compte(NomCompte,MotDePasse,Mail,Nom,Prenom,DateNaissance,DateInscription,TypeC) VALUES (:nomcompte,:mdp,:mail,:nom,:prenom,:naissance,Now(),"user")');
		$insert->execute(array(
		'nomcompte'=>$nomCompte,
		'mdp'=>$motDePasse,
		'mail'=>$mail,
		'nom'=>$nom,
		'prenom'=>$prenom,
		'naissance'=>$naissance
	));
	}

	public function createQuestion($question,$domaine,$choix1,$choix2,$choix3,$choix4,$choix5,$reponse,$duree){
		$req = $this->connexion->prepare('INSERT INTO Question(Question,DomaineQuestion,Choix1,Choix2,Choix3,Choix4,Choix5,Reponse,Duree) VALUES (:question,:domaine,:choix1,:choix2,:choix3,:choix4,:choix5,:reponse,:duree)');
		$req->execute(array(
			'question'=>$question,
			'domaine'=>$domaine,
			'choix1'=>$choix1,
			'choix2'=>$choix2,
			'choix3'=>$choix3,
			'choix4'=>$choix4,
			'choix5'=>$choix5,
			'reponse'=>$reponse,
			'duree'=>$duree
			));
	}

	public function createReponse($questionnaire,$nomcompte,$resultat,$duree){
		$req = $this->connexion->prepare('INSERT INTO Repondre(IdQuestionnaire,NomCompte,Resultat,DureeReponse,DateReponse) VALUES (:questionnaire,:nomcompte,:resultat,:duree,NOW())');
		$req->execute(array(
			'questionnaire'=>$questionnaire,
			'nomcompte'=>$nomcompte,
			'resultat'=>$resultat,
			'duree'=>$duree
			));
	}

	public function insertionFaitPartie($idQuestionnaire,$idQuestion){
		$req=$this->connexion->prepare('INSERT INTO FaitPartie(IdQuestionnaire,IdQuestion) VALUES (:idQuestionnaire,:idQuestion)');
		$req->execute(array(
			'idQuestionnaire' => $idQuestionnaire,
			'idQuestion' => $idQuestion
			));
	}

	public function chercherIdQuestionnaire($nom){
		$req=$this->connexion->prepare('SELECT IdQuestionnaire FROM Questionnaire WHERE NomQuestionnaire=:nom');
		$req->bindParam('nom',$nom);
		$req->execute();
		return $req->fetch()['IdQuestionnaire'];
	}

	public function createQuestionnaire($questionnaire,$nbquest,$domaine,$duree){
		$req = $this->connexion->prepare('INSERT INTO Questionnaire(NomQuestionnaire,NombreQuestion,Domaine,DureeQ) VALUES (:questionnaire,:nbquest,:domaine,:duree)');
		$req->execute(array(
			'questionnaire'=>$questionnaire,
			'nbquest'=>$nbquest,
			'domaine'=>$domaine,
			'duree'=>$duree
			));
	}

	public function createTheme($themeQ,$theme){
		$req=$this->connexion->prepare('INSERT INTO Theme VALUES (:themeQ,:theme)');
		$req->execute(array(
			'themeQ' => $themeQ,
			'theme' => $theme
			));
	}

	public function getCompte($nomCompte){
		$req = $this->connexion->prepare('SELECT * FROM Compte WHERE NomCompte=:nomCompte');
		$req->bindParam(":nomCompte",$nomCompte);
		$req->execute();
		return $req->fetch();
	}

	public function getQuestion($idQuestion){
		$req = $this->connexion->prepare('SELECT * FROM Question WHERE IdQuestion=:idQuestion');
		$req->bindParam(":idQuestion",$idQuestion);
		$req->execute();
		return $req->fetch();
	}

	public function getToutesLesQuestions(){
		$req = $this->connexion->prepare('SELECT IdQuestion FROM Question');
		$req->execute();
		return $req->fetchAll();
	}

	public function getQuestionnaire($idQuestionnaire){
		$req = $this->connexion->prepare('SELECT * FROM Questionnaire WHERE IdQuestionnaire=:idQuestionnaire');
		$req->bindParam(":idQuestionnaire",$idQuestionnaire);
		$req->execute();
		$tab = $req->fetch();
		return $tab;
	}

	public function getLesQuestions($idQuestionnaire){
		$req = $this->connexion->prepare('SELECT IdQuestion FROM FaitPartie WHERE IdQuestionnaire=:idQuestionnaire');
		$req->bindParam(":idQuestionnaire",$idQuestionnaire);
		$req->execute();
		$tab = $req->fetchAll();
		return $tab;
	}

	public function getReponse($nomCompte,$idQuestionnaire,$dateRep){
		$req = $this->connexion->prepare('SELECT * FROM Repondre WHERE IdQuestionnaire=:idQuestionnaire AND NomCompte=:nomcompte AND DateReponse=:daterep');
		$req->execute(array(
			'idQuestionnaire'=>$idQuestionnaire,
			'nomcompte'=>$nomCompte,
			'daterep'=>$dateRep
			));
		$tab = $req->fetch();
		return $tab;
	}

	public function getReponseUser($nomcompte){
		$req = $this->connexion->prepare('SELECT IdQuestionnaire,NomCompte,DateReponse FROM Repondre WHERE NomCompte=:nomcompte ORDER BY DateReponse');
		$req->bindParam('nomcompte',$nomcompte);
		$req->execute();
		return $req->fetchAll();
	}

	public function chercherQuestions(){
		$req=$this->connexion->prepare('SELECT IdQuestion FROM Question');
		$req->execute();
		$questions = array();
		foreach ($req as $row) {
			$id=$row["IdQuestion"];
			$questions[]=$id;
		}
		return $questions;

	}

	public function getLesQuestionnaires(){
		$req=$this->connexion->prepare('SELECT IdQuestionnaire FROM Questionnaire ORDER BY NomQuestionnaire');
		$req->execute();
		$donnees = array();
		foreach ($req as $row) {
			$id=$row["IdQuestionnaire"];
			$donnees[]=$id;
		}
		return $donnees;
	}

	public function getLesQuestionnairesRecent(){
		$req=$this->connexion->prepare('SELECT IdQuestionnaire FROM Questionnaire ORDER BY DateDerniereEdition');
		$req->execute();
		$donnees = array();
		foreach ($req as $row) {
			$id=$row["IdQuestionnaire"];
			$donnees[]=$id;
		}
		return $donnees;
	}


	public function getQuestionnaireByDomaine($domaine){
		$req=$this->connexion->prepare('SELECT IdQuestionnaire,NomQuestionnaire FROM Questionnaire WHERE Domaine=:domaine');
		$req->bindParam('domaine',$domaine);
		$req->execute();
		return $req->fetchAll();
	}

	public function getQuestionnairesNom(){
		$req=$this->connexion->prepare('SELECT IdQuestionnaire,NomQuestionnaire FROM Questionnaire');
		$req->execute();
		return $req->fetchAll();
	}

	public function getQuestionNom(){
		$req=$this->connexion->prepare('SELECT IdQuestion,Question FROM Question');
		$req->execute();
		return $req->fetchAll();
	}

	public function getQuestionByDomaine($domaine){
		$req=$this->connexion->prepare('SELECT IdQuestion,Question FROM Question WHERE DomaineQuestion=:domaine');
		$req->bindParam('domaine',$domaine);
		$req->execute();
		return $req->fetchAll();
	}

	public function getDomaineQuestion($domaine){
		$req=$this->connexion->prepare('SELECT DomaineQuestion FROM Theme WHERE Domaine=:domaine');
		$req->bindParam('domaine',$domaine);
		$req->execute();
		$tab = $req->fetchAll();
		$domaines = array();
		foreach ($tab as $domaine) {
			if (!in_array($domaine["DomaineQuestion"],$domaines)){
				$domaines[]=$domaine["DomaineQuestion"];
			}
		}
		return $domaines;
	}

	public function getDomainesQuestions(){
		$req = $this->connexion->prepare('SELECT DISTINCT DomaineQuestion FROM Theme');
		$req->execute();
		$tab = $req->fetchAll();
		$domaines=array();
		foreach ($tab as $val){
			$domaines[]=$val['DomaineQuestion'];
		}
		return $domaines;
	}

	public function getDomaine(){
		$req=$this->connexion->prepare('SELECT Domaine FROM Theme');
		$req->execute();
		$tab = $req->fetchAll();
		$domaines = array();
		foreach ($tab as $domaine) {
			if (!in_array($domaine["Domaine"],$domaines)){
				$domaines[]=$domaine["Domaine"];
			}
		}
		return $domaines;
	}

	public function getQuestionsDomaine($domaine){
		$req=$this->connexion->prepare('SELECT IdQuestion FROM Question WHERE DomaineQuestion=:domaine');
		$req->bindParam('domaine',$domaine);
		$req->execute();
		return $req->fetchAll();
	}

	public function getNomQuestionnaire($idQuestionnaire){
		$req=$this->connexion->prepare('SELECT NomQuestionnaire FROM Questionnaire WHERE IdQuestionnaire=:idQuestionnaire');
		$req->bindParam('idQuestionnaire',$idQuestionnaire);
		$req->execute();
		return $req->fetch()['NomQuestionnaire'];
	}

	public function getThemesQuestionsLierThemeQuestionnaire($themeQuestionnaire){
		$req = $this->connexion->prepare('SELECT DomaineQuestion FROM Theme WHERE Domaine=:themeQuestionnaire');
		$req->bindParam('themeQuestionnaire',$themeQuestionnaire);
		$req->execute();
		return $req->fetchAll();
	}

	public function verificationQuestion($question){
		$req= $this->connexion->prepare('SELECT Question FROM Question WHERE Question=:question');
		$req->bindParam('question',$question);
		$req->execute();
		if ($req->rowCount()==0){
			return false;
		}
		else{
			return true;
		}
	}

	public function verificationQuestionnaire($questionnaire){
		$req= $this->connexion->prepare('SELECT NomQuestionnaire FROM Questionnaire WHERE NomQuestionnaire=:questionnaire');
		$req->bindParam('questionnaire',$questionnaire);
		$req->execute();
		if ($req->rowCount()==0){
			return false;
		}
		else{
			return true;
		}
	}

	public function chercheUser($nomCompte){
		$cheruser=$this->connexion->prepare('SELECT NomCompte FROM Compte WHERE NomCompte=:nomCompte');
		$cheruser->bindParam(":nomCompte",$nomCompte);
		$cheruser->execute();
		if ($cheruser->rowCount()==0){
			return 0;
		}
		else{
			return 1;
		}
	}

	public function chercheMail($mail){
		$req=$this->connexion->prepare('SELECT NomCompte FROM Compte WHERE Mail=:mail');
		$req->bindParam(":mail",$mail);
		$req->execute();
		if ($req->rowCount()==0){
			return 0;
		}
		else{
			return 1;
		}
	}

	public function seConnecter($nomCompte,$mdp){
		$mdpcompte=$this->connexion->prepare('SELECT MotDePasse FROM Compte WHERE NomCompte=:nomCompte');
		$mdpcompte->bindParam(":nomCompte",$nomCompte);
		$mdpcompte->execute();
		if ($mdpcompte->fetch()["MotDePasse"]==$mdp){
			return 1;
		}
		else {
			return 0;
		}
	}

	public function deleteQuestionnaireFaitPartie($questionnaire){
		$req = $this->connexion->prepare('DELETE FROM FaitPartie WHERE IdQuestionnaire=:questionnaire');
		$req->bindParam('questionnaire',$questionnaire);
		$req->execute();
	}

	public function deleteQuestionnaire($idQ){
		$req = $this->connexion->prepare('DELETE FROM Questionnaire WHERE IdQuestionnaire=:questionnaire');
		$req->bindParam('questionnaire',$idQ);
		$req->execute();
	}

	public function deleteThemeQuestionnaire($theme){
		$req = $this->connexion->prepare('DELETE FROM Theme WHERE Domaine=:theme');
		$req->bindParam("theme",$theme);
		$req->execute();
	}

	public function setMail($id,$mail){
		$req = $this->connexion->prepare('UPDATE Compte SET Mail=:mail WHERE NomCompte=:id');
		$req->execute(array(
			'mail'=>$mail,
			'id'=>$id));
	}

	public function setMotDePasse($id,$mdp){
		$req = $this->connexion->prepare('UPDATE Compte SET MotDePasse=:mdp WHERE NomCompte=:id');
		$req->execute(array(
			'mdp'=>$mdp,
			'id'=>$id));
	}

	public function setNom($id,$nom){
		$req = $this->connexion->prepare('UPDATE Compte SET Nom=:nom WHERE NomCompte=:id');
		$req->execute(array(
			'nom'=>$nom,
			'id'=>$id));
	}

	public function setPrenom($id,$prenom){
		$req = $this->connexion->prepare('UPDATE Compte SET Prenom=:prenom WHERE NomCompte=:id');
		$req->execute(array(
			'prenom'=>$prenom,
			'id'=>$id));
	}

	public function setDateNaissance($id,$dateN){
		$req = $this->connexion->prepare('UPDATE Compte SET DateNaissance=:dateN WHERE NomCompte=:id');
		$req->execute(array(
			'dateN'=>$dateN,
			'id'=>$id));
	}

	public function setNombreQuestion($id,$nbq){
		$req = $this->connexion->prepare('UPDATE Questionnaire SET NombreQuestion=:nbq WHERE IdQuestionnaire=:id');
		$req->execute(array(
			'nbq'=>$nbq,
			'id'=>$id));
	}

	public function setDureeQ($id,$duree){
	$req = $this->connexion->prepare('UPDATE Questionnaire SET DureeQ=:duree WHERE IdQuestionnaire=:id');
	$req->execute(array(
		'duree'=>$duree,
		'id'=>$id));
	}

	public function setNomQuestionnaire($id,$nom){
		$req = $this->connexion->prepare('UPDATE Questionnaire SET NomQuestionnaire=:nom WHERE IdQuestionnaire=:id');
		$req->execute(array(
			'nom'=>$nom,
			'id'=>$id));
	}

	public function setDateEdition($id){
		$req = $this->connexion->prepare('UPDATE Questionnaire SET DateDerniereEdition=NOW() WHERE IdQuestionnaire=:id');
		$req->bindParam('id',$id);
		$req->execute();
	}

	public function setDomaine($id,$domaine){
		$req = $this->connexion->prepare('UPDATE Questionnaire SET Domaine=:domaine WHERE IdQuestionnaire=:id');
		$req->execute(array(
			'domaine'=>$domaine,
			'id'=>$id));
	}

	public function setQuestion($id,$question){
		$req = $this->connexion->prepare('UPDATE Question SET Question=:question WHERE IdQuestion=:id');
		$req->execute(array(
			'question'=>$question,
			'id'=>$id));
	} 

	public function setDomaineQuestion($id,$domaine){
		$req = $this->connexion->prepare('UPDATE Question SET DomaineQuestion=:domaine WHERE IdQuestion=:id');
		$req->execute(array(
			'domaine'=>$domaine,
			'id'=>$id));
	} 

	public function setDuree($id,$duree){
		$req = $this->connexion->prepare('UPDATE Question SET Duree=:duree WHERE IdQuestion=:id');
		$req->execute(array(
			'duree'=>$duree,
			'id'=>$id));
	}

	public function setReponse($id,$reponse){
		$req = $this->connexion->prepare('UPDATE Question SET Reponse=:reponse WHERE IdQuestion=:id');
		$req->execute(array(
			'reponse'=>$reponse,
			'id'=>$id));
	}

	public function setChoix1($id,$choix){
		$req = $this->connexion->prepare('UPDATE Question SET Choix1=:choix WHERE IdQuestion=:id');
		$req->execute(array(
			'choix'=>$choix,
			'id'=>$id));
	}

	public function setChoix2($id,$choix){
		$req = $this->connexion->prepare('UPDATE Question SET Choix2=:choix WHERE IdQuestion=:id');
		$req->execute(array(
			'choix'=>$choix,
			'id'=>$id));
	}

	public function setChoix3($id,$choix){
		$req = $this->connexion->prepare('UPDATE Question SET Choix3=:choix WHERE IdQuestion=:id');
		$req->execute(array(
			'choix'=>$choix,
			'id'=>$id));
	}

	public function setChoix4($id,$choix){
		$req = $this->connexion->prepare('UPDATE Question SET Choix4=:choix WHERE IdQuestion=:id');
		$req->execute(array(
			'choix'=>$choix,
			'id'=>$id));
	}

	public function setChoix5($id,$choix){
		$req = $this->connexion->prepare('UPDATE Question SET Choix5=:choix WHERE IdQuestion=:id');
		$req->execute(array(
			'choix'=>$choix,
			'id'=>$id));
	}

	public function getNombreQuestions($idQuestionnaire){
		$req=$this->connexion->prepare('SELECT COUNT(*) FROM FaitPartie WHERE IdQuestionnaire=:idQuestionnaire');
		$req->bindParam('idQuestionnaire',$idQuestionnaire);
		$req->execute();
		return $req->fetch()[0];
	}

	public function getNombreReponse($idQuestionnaire){
		$req=$this->connexion->prepare('SELECT COUNT(*) FROM Repondre WHERE IdQuestionnaire=:idQuestionnaire');
		$req->bindParam('idQuestionnaire',$idQuestionnaire);
		$req->execute();
		return $req->fetch()[0];
	}
}?>
