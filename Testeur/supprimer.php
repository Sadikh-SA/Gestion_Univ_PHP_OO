<?php
    $id = $_GET['id'];

    $pdo = new PDO("mysql:host=127.0.0.1;dbname=MiniProjetPHPOO","root","Moimeme2018");
		$requete = "SELECT matricule, nom, prenom, tel, mail, ddn from Etudiant,NonBoursier where NonBoursier.idEtu='$id'";
		$res = $pdo->prepare($requete);
		$donnee = $res ->execute();
        while($a = $res->fetch()){
            $matricule = $a['matricule'];
            //break;
        //$matricule = $a['matricule'];
        //if ($a['adresse']!=NULL) {
            //$matricule = $a['matricule'];
            var_dump($matricule);
            $nom = $a['nom'];
            var_dump($nom);
            $prenom = $a['prenom'];
            $tel = $a['tel'];
            var_dump($tel);
            $mail = $a['mail'];
            $ddn = $a['ddn'];
            //$adresse = $a['adresse'];
            break;
        }           
       /* } elseif(($a['idbour']!=NULL || $a['idtype']!=NULL) && $a['idlog']==NULL){
            $matricule = $a['matricule'];
            $nom = $a['nom'];
            $prenom = $a['prenom'];
            $tel = $a['tel'];
            $mail = $a['mail'];
            $ddn = $a['ddn'];

            $requete = "select libelle from Situation where idtype=:idtype";
            $res = $this->getPDO()->prepare($requete);

            $z = $res->execute(array(':idtype' => $a['idtype']));
            while ($row = $res->fetch()) {
                $z = $row['libelle'];
                break;
            }
            $type = $z;

            //$etudiant = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
        }
        */

    include '../Classes/ServiceEtudiant.php';
    $test = new Service();	


    $etudiant = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
    //$matricule="SA911123";
    //$etudiant = new Loger($matricule,"Camara","Babs","774625521","babs.Camara@gmail.com","1992-07-14","demi-pension","25","Campus A");
    $test->Supprimer($etudiant,$matricule);
    //header('location: lister.php');
?>