<?php

include '../Classes/ServiceEtudiant.php';
$test = new Service();	

$matricule="SA990920";
$etudiant = new Boursier($matricule,"GUEYE","Mouhamadou Lamine","777777777","lg@mail.com","2017-06-07","Demi-pension");
$test->update($etudiant,$matricule);
?>