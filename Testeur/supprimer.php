<?php
    $id = $_GET['id'];
	include '../Classes/ServiceEtudiant.php';
    $test = new Service();
    $pdo = $test->getPDO();
    $requete="SELECT matricule FROM Etudiant WHERE Etudiant.idEtu='$id'";
    $res = $pdo->prepare($requete);
    $matricule = $res->execute();
    //var_dump($matricule);
    $a = $res->fetch();

    $matricule = $a['matricule'];
    //var_dump($matricule);
    $test->supprimer($matricule);
    header('location:lister.php');
?>