<?php

include '../Classes/ServiceEtudiant.php';
$test = new Service();	

$matricule="SA940311";
$etudiant = new Loger($matricule,"GUEYE","Libasse","774514521","lgg@mail.com","1987-03-05","Demi-pension","15","Campus A");
$test->update($etudiant,$matricule);
?>