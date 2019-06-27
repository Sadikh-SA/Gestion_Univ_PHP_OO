<?php

include '../Classes/ServiceEtudiant.php';
$test = new Service();	

$matricule="SA911123";
$etudiant = new Loger($matricule,"Camara","Babs","774625521","babs.Camara@gmail.com","1992-07-14","demi-pension","25","Campus A");
$test->update($etudiant,$matricule);
?>