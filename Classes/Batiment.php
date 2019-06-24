<?php

    class Batiment
    {
        private $numbat;

        public function __construct($numbat="")
        {
            $this->numbat = $numbat;
        }

    
        public function getNumBat(){
            return $this->numbat;
        }

        public function setNumBat($newNumBat)
        {
            $this->numbat=$newNumBat;
        }
    }

?>