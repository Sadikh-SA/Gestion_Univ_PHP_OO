<?php

    class Etudiant 
    {
        
        private $matricule;
        private $nom;
        private $prenom;
        private $tel;
        private $mail;
        private $ddn;

        public function __construct($matricule="",$nom="",$prenom="",$tel="",$mail="",$ddn="")
        {
            //$this->id = $id;
            $this->matricule = $matricule;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->tel = $tel;
            $this->mail = $mail;
            $this->ddn = $ddn;
        } 

        public function getMatricule() {
            return $this->matricule;
        }
        
        public function SetMatricule($newmatricule) {
            $this->matricule = $newmatricule;
        }

        public function getNom() {
            return $this->nom;
        }
        
        public function SetNom($newnom) {
            $this->nom = $newnom;
        }
        public function getPrenom() {
            return $this->prenom;
        }
        
        public function SetPrenom($newprenom) {
            $this->prenom = $newprenom;
        }
        public function getMail() {
            return $this->mail;
        }
        
        public function SetMail($newmail) {
            $this->mail = $newmail;
        }
        public function getTel() {
            return $this->tel;
        }
        
        public function SetTel($newtel) {
            $this->tel = $newtel;
        }
        public function getDdn() {
            return $this->ddn;
        }
        
        public function SetDdn($newddn) {
            $this->ddn = $newddn;
        }
    }

?>