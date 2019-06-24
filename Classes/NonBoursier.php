<?php

    class NonBoursier extends Etudiant
    {
        private $adresse;

        public function __construct($matricule="",$nom="",$prenom="",$tel="",$mail="",$ddn="",$adresse="")
        {
            parent:: __construct($matricule,$nom,$prenom,$tel,$mail,$ddn);
            $this->adresse = $adresse;
        }


        public function getAdresse()
        {
            return $this->adresse;
        }
        public function setAdresse($newadresse)
        {
            $this->adresse = $newadresse;
        }
    }
    

?>