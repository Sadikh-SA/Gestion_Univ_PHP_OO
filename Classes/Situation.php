<?php


    class Situation 
    {
        //private $idType;
        private $libelle;
        private $montant;

        public function __construct($libelle,$montant)
        {
            $this->libelle = $libelle;
            $this->montant = $montant;
        }

        public function getLibelle()
        {
            return $this->libelle;
        }
        public function setLibelle($newlibelle){
            $this->libelle = $newlibelle;
        }
        public function getMontant(){
            return $this->montant;
        }
        public function setMontant($newmontant){
            $this->montant = $newmontant;
        }
    }

?>