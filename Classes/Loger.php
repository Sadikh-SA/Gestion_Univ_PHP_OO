<?php

    class Loger extends Boursier
    {

        private $numbatiment;
        private $numchambre;

        public function __construct($matricule="",$nom="",$prenom="",$tel="",$mail="",$ddn="",$libelle="",$numchambre,$numbatiment)
        {
            parent:: __construct($matricule,$nom,$prenom,$tel,$mail,$ddn,$libelle);
            $this->numchambre = $numchambre;
            $this->numbatiment = $numbatiment;
        }

        public function getChambre() {
            return $this->numchambre;
        }
        public function getBatiment() {
            return $this->numbatiment;
        }

        public function setChambre($newchambre) {
            $this->numchambre = $newchambre;
        }

        public function setBatiment($newbatiment){
            $this->numbatiment = $newbatiment;
        }

    }
    

?>