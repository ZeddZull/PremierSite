<?php
class Questionnaire {

	private $idQuestionnaire;
	private $nom;
	private $nombreQuestion;
	private $duree;
	private $domaine;
	private $questions;
	private $bdd;
	private $dateEdition;

	function __construct($idQuestionnaire) {

		$this->idQuestionnaire=$idQuestionnaire;
		$this->bdd = new BaseDeDonnees;
		$info = $this->bdd->getQuestionnaire($this->idQuestionnaire);
		$this->nom=$info['NomQuestionnaire'];
		$this->nombreQuestion=$info["NombreQuestion"];
		$this->duree = $info["DureeQ"];
		$this->domaine = $info["Domaine"];
		$donnes = $this->bdd->getLesQuestions($this->idQuestionnaire);
		$questions = array();
		foreach ($donnes as $tab) {
			$questions[]=new Question($tab['IdQuestion']);
		}
		$this->questions=$questions;
		$this->dateEdition=$info["DateDerniereEdition"];
	}

	public function getId(){
		return $this->idQuestionnaire;
	}

	public function getNombreQuestion(){
		return $this->nombreQuestion;
	}

	public function getDuree(){
		return $this->duree;
	}

	public function getDomaine(){
		return $this->domaine;
	}

	public function getQuestions(){
		return $this->questions;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getDateEdition(){
		return $this->dateEdition;
	}

	public function setNombreQuestion($nbq){
		$this->nombreQuestion=$nbq;
		$this->bdd->setNombreQuestion($this->idQuestionnaire,$nbq);
	}

	public function setDuree($duree){
		$this->duree=$duree;
		$this->bdd->setDureeQ($this->idQuestionnaire,$duree);
	}

	public function setNom($nom){
		$this->nom=$nom;
		$this->bdd->setNomQuestionnaire($this->idQuestionnaire,$nom);
	}

	public function setDomaine($domaine){
		$this->domaine=$domaine;
		$this->bdd->setDomaine($this->idQuestionnaire,$domaine);
	}

	public function setDate(){
		$this->bdd->setDateEdition($this->idQuestionnaire);
		$this->dateEdition=date("Y-m-d");
	}

	public function setQuestions($questions){
		$this->bdd->deleteQuestionnaireFaitPartie($this->idQuestionnaire);
		$this->questions = array();
		foreach ($questions as $id){
			$this->bdd->insertionFaitPartie($this->idQuestionnaire,$id);
			$this->questions[] = new Question($id);
		}
	}

	public function getNombreQuestions(){
		return $this->bdd->getNombreQuestions($this->idQuestionnaire);
	}
}
?>