<?php
    $id = $_GET['id'];
	include '../Classes/ServiceEtudiant.php';
	$test = new Service();	
    $pdo = $test->getPDO();
		//$requete = "SELECT matricule, nom, prenom, tel, mail, ddn from Etudiant,NonBoursier where NonBoursier.idEtu='$id'";
        $requete="SELECT matricule, nom, prenom, tel, mail, ddn from Etudiant,NonBoursier,Boursier,Loger where (NonBoursier.idEtu='$id' and NonBoursier.idEtu=Etudiant.idEtu) OR (Boursier.idEtu='$id' and Boursier.idEtu=Etudiant.idEtu) OR (Loger.idEtu='$id' and Loger.idEtu=Etudiant.idEtu)";
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
            $res = $pdo->prepare($requete);

            $z = $res->execute(array(':idtype' => $a['idtype']));
            while ($row = $res->fetch()) {
                $z = $row['libelle'];
                break;
            }
            $type = $z;

            //$etudiant = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
        }
        */

    // include '../Classes/ServiceEtudiant.php';
    // $test = new Service();	

        $requete = "select * from Etudiant,Boursier where Boursier.idEtu='$id' and Boursier.idEtu=Etudiant.idEtu";
        $res = $pdo->query($requete);
        $bour = $res->fetch();
        while ($a = $res->fetch()) {
            $bour = $a['idEtu'];
            $type = $a['idtype'];
        }
        $sql = "select * from Etudiant,NonBoursier where NonBoursier.idEtu='$id' and NonBoursier.idEtu=Etudiant.idEtu";
        $pres = $pdo->query($sql);
        $nobour = $pres->fetch();
        while ($b = $pres->fetch()) {
            $nobour = $b['idEtu'];
            $adresse = $b['adresse'];
        }

        $test = "select * from Etudiant,Loger where Loger.idEtu='$id' and and Loger.idEtu=Etudiant.idEtu";
        $pre = $pdo->query($sql);
        $loge = $pre->fetch();
        while ($c = $pre->fetch()) {
            $loge = $c['idEtu'];
            
        }

        if ($bour!=null) {
            $pre1 = $pdo->prepare("select * from Situation where idtype=:idtype");
                $xy = $pre1->execute(array(':idtype' =>$type));
                $ter=$xy;
                while ($row = $pre->fetch()) {
                    $ter = $row['libelle'];
                    //break;
                }
                //var_dump($ter);
                $etudiant = new Boursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$ter);
                //$matricule="SA911123";
                //$etudiant = new Loger($matricule,"Camara","Babs","774625521","babs.Camara@gmail.com","1992-07-14","demi-pension","25","Campus A");
                $test->Supprimer($etudiant,$matricule);

        } elseif($nobour!=null) {
            $etudiant = new NonBoursier($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
            //$matricule="SA911123";
            //$etudiant = new Loger($matricule,"Camara","Babs","774625521","babs.Camara@gmail.com","1992-07-14","demi-pension","25","Campus A");
            $test->Supprimer($etudiant,$matricule);
    
            
        }
        elseif ($loge!=null) {
            $etudiant = new Loger($matricule,$nom,$prenom,$tel,$mail,$ddn,$adresse);
            //$matricule="SA911123";
            //$etudiant = new Loger($matricule,"Camara","Babs","774625521","babs.Camara@gmail.com","1992-07-14","demi-pension","25","Campus A");
            $test->Supprimer($etudiant,$matricule);
        }
        
    
    header('location: lister.php');
?>