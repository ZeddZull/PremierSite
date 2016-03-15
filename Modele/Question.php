<?php
class Question {

	private $idQuestion;
	private $question;
	private $domaine;
	private $choix;
	private $reponse;
	private $duree;
	private $bdd;

	function __construct($idQuestion) {

		$this->idQuestion = $idQuestion;
		$this->bdd = new BaseDeDonnees;
		$info = $this->bdd->getQuestion($idQuestion);
		$this->question=$info["Question"];
		$this->domaine=$info["DomaineQuestion"];
		$this->reponse=$info["Reponse"];
		$this->duree=$info["Duree"];
		$this->choix =array($info["Choix1"],$info["Choix2"],$info["Choix3"],$info["Choix4"],$info["Choix5"]);
	}

	public function getId() {
		return $this->idQuestion;
	}

	public function getQuestion() {
		return $this->question;
	}

	public function getDomaine() {
		return $this->domaine;
	}

	public function getChoix() {
		return $this->choix;
	}

	public function getChoix1() {
		return $this->choix[0];
	}

	public function getChoix2() {
		return $this->choix[1];
	}

	public function getChoix3() {
		return $this->choix[2];
	}

	public function getChoix4() {
		return $this->choix[3];
	}

	public function getChoix5() {
		return $this->choix[4];
	}

	public function getReponse() {
		return $this->reponse;
	}

	public function getDuree() {
		return $this->duree;
	}

	public function setDomaine($domaine){
		$this->domaine=$domaine;
		$this->bdd->setDomaineQuestion($this->idQuestion,$domaine);
	}

	public function setQuestion($question){
		$this->question=$question;
		$this->bdd->setQuestion($this->idQuestion,$question);
	}

	public function setReponse($reponse){
		$this->reponse=$reponse;
		$this->bdd->setReponse($this->idQuestion,$reponse);
	}

	public function setDuree($duree){
		$this->duree=$duree;
		$this->bdd->setDuree($this->idQuestion,$duree);
	}

	public function setChoix($choix){
		$this->choix=$choix;
		$this->bdd->setChoix1($this->idQuestion,$choix[0]);
		$this->bdd->setChoix2($this->idQuestion,$choix[1]);
		$this->bdd->setChoix3($this->idQuestion,$choix[2]);
		$this->bdd->setChoix4($this->idQuestion,$choix[3]);
		$this->bdd->setChoix5($this->idQuestion,$choix[4]);		
	}
}