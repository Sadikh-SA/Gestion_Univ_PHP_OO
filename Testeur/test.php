<?php

include '../Classes/ServiceEtudiant.php';
$test = new Service();	

$matricule="SA980714";
$etudiant = new NonBoursier($matricule,"NIANG","Dior","dior.niang@gmail.com","774625521","1998-07-14","Diourbel, Touba");
$test->update($etudiant,$matricule);
?>