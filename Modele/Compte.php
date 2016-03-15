<?php

class User {

	private $nomCompte;
	private $mail;
	private $nom;
	private $prenom;
	private $dateNaissance;
	private $dateInscription;
	private $typeCompte;
	private $motDePasse;
	private $bdd;

	function __construct($nomCompte){
		$this->nomCompte = $nomCompte;
		$this->bdd = new BaseDeDonnees;
		$user=$this->bdd->getCompte($this->nomCompte);
		$this->mail = $user['Mail'];
		$this->nom = $user["Nom"];
		$this->prenom = $user["Prenom"];
		$this->dateNaissance = $user["DateNaissance"];
		$this->dateInscription = $user["DateInscription"];
		$this->typeCompte = $user['TypeC'];
		$this->motDePasse = $user['MotDePasse'];
	}

	public function getNomCompte(){
		return $this->nomCompte;
	}

	public function getMotDePasse(){
		return $this->motDePasse;
	}

	public function getMail(){
		return $this->mail;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function getDateNaissance(){
		return $this->dateNaissance;
	}

	public function getDateInscription(){
		return $this->dateInscription;
	}

	public function getTypeCompte(){
		return $this->typeCompte;
	}

	public function getReponses(){
		return $this->reponse;
	}

	public function setMail($mail){
		$this->mail=$mail;
		$this->bdd->setMail($this->nomCompte,$mail);
	}

	public function setMotDePasse($mdp){
		$this->motDePasse = $mdp;
		$this->bdd->setMotDePasse($this->nomCompte,$mdp);
	}

	public function setNom($nom){
		$this->nom = $nom;
		$this->bdd->setNom($this->nomCompte,$nom);
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
		$this->bdd->setPrenom($this->nomCompte,$prenom);
	}

	public function setDateNaissance($dateNaissance){
		$this->dateNaissance = $dateNaissance;
		$this->bdd->setDateNaissance($this->nomCompte,$dateNaissance);
	}

}?>