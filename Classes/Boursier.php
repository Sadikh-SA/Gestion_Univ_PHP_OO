<?php

    include 'Situation.php';

    class Boursier extends Etudiant
    {

        private $libelle;
       // private $montant;
        

        public function __construct($matricule="",$nom="",$prenom="",$tel="",$mail="",$ddn="",$libelle)
        {
            parent:: __construct($matricule,$nom,$prenom,$tel,$mail,$ddn);
            $this->libelle = $libelle;
            //$this->montant = $montant->getMontant();
        }

        public function getLibelle(){
            return $this->libelle;
        }
        public function getMontant(){
            return $this->montant;
        }
        public function setLibelle($newlibelle){
            $this->libelle = $newlibelle;
        }
        public function setMontant($newmontant){
            $this->montant = $newmontant;
        }
        
    }
?>