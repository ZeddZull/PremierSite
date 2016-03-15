<?php
class Reponse {

	private $nomCompte;
	private $idQuestionnaire;
	private $dateRep;
	private $resultat;
	private $bdd;
	private $duree;

	function __construct($nomCompte,$idQuestionnaire,$dateRep){

		$this->nomCompte=$nomCompte;
		$this->idQuestionnaire=$idQuestionnaire;
		$this->dateRep=$dateRep;
		$this->bdd=new BaseDeDonnees;
		$info = $this->bdd->getReponse($nomCompte,$idQuestionnaire,$dateRep);
		$this->resultat=$info['Resultat'];
		$this->duree=$info['DureeReponse'];
	}

	public function getDuree(){
		return $this->duree;
	}

	public function getResultat(){
		return $this->resultat;
	}

	public function getDateReponse(){
		return $this->dateRep;
	}

	public function getDate(){
		$date=new DateTime($this->dateRep);
		return $date->format("D M Y");
	}

	public function getIdQuestionnaire(){
		return $this->idQuestionnaire;
	}

	public function getNomCompte(){
		return $this->nomCompte;
	}

	public function getNomQuestionnaire(){
		return $this->bdd->getNomQuestionnaire($this->idQuestionnaire);
	}
}?>