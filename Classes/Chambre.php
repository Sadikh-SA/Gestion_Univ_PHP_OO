<?php

    class chambre {
        private $numbat;
        private $numchambre;

        public function __construct($numchambre="", $numbat)
        {
            $this->numbat= $numbat;
            $this->numchambre = $numchambre;
        }

        public function getNumBat(){
            return $this->numbat;
        }
        public function setNumBat($newnumbat){
            $this->numbat = $newnumbat;
        }

        public function getNumChambre(){
            return $this->numchambre;
        }
        public function setNumChambre($newnumchambre){
            $this->numchambre = $newnumchambre;
        }

    }

?>