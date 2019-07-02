<?php


include 'Etudiant.php';
include 'NonBoursier.php';
include 'Boursier.php';
//include 'connexion.php';
include 'Loger.php';
include 'Chambre.php';
include 'Batiment.php';

class Service
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public function connexion($db_name = "MiniProjetPHPOO", $db_user = 'root', $db_pass = 'Moimeme2018', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=MiniProjetPHPOO', 'root', 'Moimeme2018');
            $this->pdo = $pdo;
        }
        //echo "true";
        return $this->pdo;
    }

    public function findAll($table)
    {
        if ($table == "Etudiant") {
            $resultat = "SELECT * FROM $table";
            $res = $this->getPDO()->query($resultat);
            //$p = $res->fetchAll(pdo::FETCH_ASSOC);
            return $res;
        } else if ($table == "Boursier" || $table == "NonBoursier") {

            $resultat = "SELECT matricule, nom, prenom, mail, tel, ddn FROM $table , Etudiant where $table.idEtu=Etudiant.idEtu";
            $res = $this->getPDO()->query($resultat);
            //$p = $res->fetchAll(pdo::FETCH_ASSOC);
            return $res;
        } else if ($table == "Loger") {

            $resultat = "SELECT matricule, nom, prenom, mail, tel, ddn FROM $table , Etudiant where $table.idEtu=Etudiant.idEtu";
            $res = $this->getPDO()->query($resultat);
            //$p = $res->fetchAll(pdo::FETCH_ASSOC);
            return $res;
        } elseif ($table == "Batiment") {
            $resultat = "SELECT * FROM $table";
            $res = $this->getPDO()->query($resultat);
            //$p = $res->fetchAll(pdo::FETCH_ASSOC);
            return $res;
        }
    }

    public function find($table, $matricule)
    {

        $requete = "select * from $table where matricule=:matricule";
        $res = $this->getPDO()->prepare($requete);
        $res->execute(array(':matricule' => $matricule));
        //$p = $res->fetch(pdo::FETCH_ASSOC);
        return $res;
    }


    public function add(Etudiant $objet)
    {
        $requete = "INSERT INTO Etudiant (matricule, nom, prenom, mail, tel, ddn) VALUE (?,?,?,?,?,?)";
        //$requete = "insert into Etudiant Set matricule=:matricule, nom=:nom, prenom=:prenom, mail=:mail, tel=:tel, ddn=:ddn";
        $res = $this->getPDO()->prepare($requete);
        ////var_dump($res);
        $yx = $res->execute(array($objet->getMatricule(), $objet->getNom(), $objet->getPrenom(), $objet->getMail(), $objet->getTel(), $objet->getDdn()));
        ////var_dump($donnee);

        $pre = $this->getPDO()->prepare("select idEtu from Etudiant order by idEtu DESC");
        $y = $pre->execute(array());
        while ($row = $pre->fetch()) {
            $y = $row['idEtu'];
            break;
        }
        ////var_dump($y);

        if (get_class($objet) == "NonBoursier") {
            if ($yx) {
                $requete = "insert into NonBoursier Set idEtu=:idEtu, Adresse=:Adresse";
                $res = $this->getPDO()->prepare($requete);
                $donnee = $res->execute(array(':idEtu' => $y, ':Adresse' => $objet->getAdresse()));
                //$donnee = $res->fetch(pdo::FETCH_ASSOC);
                ////var_dump($res);
                return $donnee;
            }
        } elseif (get_class($objet) == "Boursier") {

            if ($yx) {
                $requete = "select idtype from Situation where libelle=:libelle";
                $res = $this->getPDO()->prepare($requete);

                $z = $res->execute(array(':libelle' => $objet->getLibelle()));
                while ($row = $res->fetch()) {
                    $z = $row['idtype'];
                    break;
                }
                ////var_dump($z);

                $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                $res = $this->getPDO()->prepare($requete);
                ////var_dump($res);
                $donnee = $res->execute(array($y, $z));
                //$donnee = $res->fetch();
                return $donnee;
            }
        } elseif (get_class($objet) == "Loger") {
            if ($yx) {
                $requete = "select idtype from Situation where libelle=:libelle";
                $res = $this->getPDO()->prepare($requete);

                $z = $res->execute(array(':libelle' => $objet->getLibelle()));
                while ($row = $res->fetch()) {
                    $z = $row['idtype'];
                    break;
                }

                $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                $res = $this->getPDO()->prepare($requete);
                $res->execute(array($y, $z));

                $res = $this->getPDO()->prepare("select idbour from Boursier order by idEtu DESC");
                $idboursier = $res->execute(array());
                while ($row = $res->fetch()) {
                    $idboursier = $row['idbour'];
                    break;
                }

                ////var_dump($idboursier);

                $res = $this->getPDO()->prepare("select idbat from Batiment where numbat=:numbat");
                $idbatiment = $res->execute(array(':numbat' => $objet->getBatiment()));

                while ($row = $res->fetch()) {
                    $idbatiment = $row['idbat'];
                    break;
                }

                ////var_dump($idboursier);

                $res = $this->getPDO()->prepare("select idcham from Chambre where numcham=:numcham and idbat=:idbat");
                $idchambre = $res->execute(array(':numcham' => $objet->getChambre(), ':idbat' => $idbatiment));

                while ($row = $res->fetch()) {
                    $idchambre = $row['idcham'];
                    break;
                }

                ////var_dump($idchambre);

                $requete = "INSERT INTO Loger (idbour,idEtu, idcham) VALUE (?,?,?)";
                $res = $this->getPDO()->prepare($requete);
                $donnee = $res->execute(array($idboursier, $y, $idchambre));
                ////var_dump($donnee);

                return $donnee;
            }
        }
    }

    public function findBoursier($table)
    {
        $requete = "select * from Etudiant, $table where Etudiant.idEtu=$table.idEtu";
        $res = $this->getPDO()->prepare($requete);
        $res->execute();
        //$donnee = $res->fetch(pdo::FETCH_ASSOC);
        return $res;
    }

    public function addplus($table)
    {
        if ($table == "Batiment") {
            $requete = "INSERT INTO $table (numbat) VALUE (?)";
            $res = $this->getPDO()->prepare($requete);
            $yx = $res->execute(array());
        } else {
            # code...
        }
    }

    public function checkStatut($matricule)
    {
        $requete = "select * from ";
        $res = $this->getPDO()->prepare($requete);
        $res->execute();
    }


    public function statut($donnee) {
        $requete = "select idEtu from Etudiant where matricule='$donnee'";
        $res = $this->getPDO()->query($requete);
        $donne = $res->fetch();
        ////var_dump($donne['idEtu']);
        $y = $donne['idEtu'];
        $requete1 = "select idtype from Boursier where Boursier.idEtu=$y";

        $res1 = $this->getPDO()->query($requete1);
        $donne1 = $res1->fetch();
        ////var_dump($donne1['idtype']);
        $z =$donne1['idtype'];
        if ($z==null) {
            return "NonBouriser";
        }
        else{

            $requete2 = "select libelle from Situation where Situation.idtype=$z";

            $res2 = $this->getPDO()->query($requete2);
            $donne2 = $res2->fetch();

            ////var_dump($donne2['libelle']);
            $g = $donne2['libelle'];

            return $g;
        }

    }

    public function chambre($e){
        $requete = "select numcham from Chambre where idbat=$e";
        $res = $this->getPDO()->query($requete);
        $donne = $res->fetch();

            ////var_dump($donne2['libelle']);
            $g = $donne['numcham'];
            //var_dump($g);
            return $g;
    }

    /*
        public function findAllBoursier()
        {
            $resultat = 'SELECT * FROM Boursier,Etudiant where Etudiant.idEtu=Boursier.idbour';
            $res = $this->getPDO()->query($resultat);
            $donnee = $res->fetchAll(PDO::FETCH_OBJ);
            return $donnee;
        }
*/


    public function update(Etudiant $objet , $matricule)
    {
        $requete = "UPDATE Etudiant SET matricule=:matricule, nom=:nom, prenom=:prenom, mail=:mail, tel=:tel, ddn=:ddn where matricule=:matricule1";
        $res = $this->getPDO()->prepare($requete);
        $donne = $res->execute(array(':matricule' => $objet->getMatricule(), ':nom' => $objet->getNom(), ':prenom' => $objet->getPrenom(), ':mail' => $objet->getMail(), ':tel' => $objet->getTel(), ':ddn' => $objet->getDdn(), ':matricule1' => $matricule));
        //var_dump($donne);
        
        $pre = $this->getPDO()->prepare("SELECT idEtu from Etudiant where matricule=:mat");
        $y = $pre->execute(array(':mat' => $matricule));
        while ($row = $pre->fetch()) {
            $y = $row['idEtu'];
            break;
        }
        ////var_dump($y);
        if (get_class($objet) == "NonBoursier") {

            $pres = $this->getPDO()->prepare("select * from Loger where Loger.idEtu=:idEtu");
            $moi = $pres->execute(array(':idEtu' => $y));
            $log=$moi;
            while ($row = $pre->fetch()) {
                $log = $row['idEtu'];
                //break;
            }
            ////var_dump($log);
            
            $pre = $this->getPDO()->prepare("select * from Boursier where Boursier.idEtu=:idEtu");
            $zx = $pre->execute(array(':idEtu' => $y));
            $z=$zx;
            while ($row = $pre->fetch()) {
                $z = $row['idEtu'];
                //break;
            }
            ////var_dump($z);

            if ($z!=0 || $z!=NULL) {
                if ($log!=null || $log!=0) {
                    $requete = "DELETE FROM Loger where idEtu=:idEtu";
                    $stmt = $this->getPDO()->prepare($requete);
                    $resu = $stmt->execute(array(':idEtu' =>$log));
                    ////var_dump($resu);
                }
                $requete = "DELETE FROM Boursier where idEtu=:idEtu";
                $stmt = $this->getPDO()->prepare($requete);
                $resu = $stmt->execute(array(':idEtu' =>$z));
                ////var_dump($resu);

                $requete = "INSERT INTO NonBoursier SET idEtu=:idEtu, Adresse=:Adresse";
                $res = $this->getPDO()->prepare($requete);
                $donnee = $res->execute(array(':idEtu' => $y, ':Adresse' => $objet->getAdresse()));
                return $donnee;
            } else {
                $pre = $this->getPDO()->prepare("select * from NonBoursier where NonBoursier.idEtu=:idEtu");
                $zx = $pre->execute(array(':idEtu' => $y));
                $z=$zx;
                while ($row = $pre->fetch()) {
                    $z = $row['idnob'];
                    //break;
                }
                ////var_dump($z);
                if ($zx) {
                    $requete = "UPDATE NonBoursier SET idEtu=:idEtu, Adresse=:Adresse where idnob=:idnob";
                    $res = $this->getPDO()->prepare($requete);
                    $donne = $res->execute(array(':idnob' => $z, ':idEtu' => $y, ':Adresse' => $objet->getAdresse()));
                    ////var_dump($donne);
                }   
            }
        }elseif (get_class($objet) == "Boursier") {

           /* $pres = $this->getPDO()->prepare("select * from Loger where Loger.idEtu=:idEtu");
            $moi = $pres->execute(array(':idEtu' => $y));
            $log=$moi;
            while ($row = $pre->fetch()) {
                $log = $row['idEtu'];
                //break;
            }
            //var_dump($log);*/
            
            $pre = $this->getPDO()->prepare("select * from NonBoursier where NonBoursier.idEtu=:idEtu");
            $zx = $pre->execute(array(':idEtu' => $y));
            $z=$zx;
            while ($row = $pre->fetch()) {
                $z = $row['idEtu'];
                //break;
            }
            //var_dump($z);

            $pres = $this->getPDO()->prepare("select * from Loger where Loger.idEtu=:idEtu");
            $moi = $pres->execute(array(':idEtu' => $y));
            $log=$moi;
            while ($row = $pre->fetch()) {
                $log = $row['idEtu'];
                //break;
            }
            //var_dump($log);

            if ($z!=0 || $z!=NULL) {
                $requete = "DELETE FROM NonBoursier where idEtu=:idEtu";
                $stmt = $this->getPDO()->prepare($requete);
                $resu = $stmt->execute(array(':idEtu' =>$z));
                //var_dump($resu);

                $pre1 = $this->getPDO()->prepare("select * from Situation where libelle=:idlibelle");
                $xy = $pre1->execute(array(':idlibelle' => $objet->getLibelle()));
                $ter=$xy;
                while ($row = $pre->fetch()) {
                    $ter = $row['idtype'];
                    //break;
                }
                //var_dump($ter);

                $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                $res = $this->getPDO()->prepare($requete);
                $res->execute(array($y, $ter));

            }else{

                if($log!=0 || $log!=NULL) {
                    $requete = "DELETE FROM Loger where idEtu=:idEtu";
                    $stmt = $this->getPDO()->prepare($requete);
                    $resu = $stmt->execute(array(':idEtu' =>$log));
                    //var_dump($resu);
                }
                $pre = $this->getPDO()->prepare("select * from Boursier where Boursier.idEtu=:idEtu");
                $zx = $pre->execute(array(':idEtu' => $y));
                $z=$zx;
                while ($row = $pre->fetch()) {
                    $z = $row['idbour'];
                    //break;
                }
                //var_dump($z);

                $pre1 = $this->getPDO()->prepare("select * from Situation where libelle=:idlibelle");
                $xy = $pre1->execute(array(':idlibelle' => $objet->getLibelle()));
                $ter=$xy;
                while ($row = $pre->fetch()) {
                    $ter = $row['idtype'];
                    //break;
                }
                //var_dump($ter);
                
                if ($zx) {
                    $requete = "UPDATE Boursier SET idbour=:idbour, idEtu=:idEtu, idtype=:idtype  where idbour=:idbour";
                    $res = $this->getPDO()->prepare($requete);
                    $donne = $res->execute(array(':idbour' => $z, ':idEtu' => $y, ':idtype' => $ter));
                    //var_dump($donne);
                }
            }
        }
        elseif (get_class($objet) == "Loger") {

            $pre = $this->getPDO()->prepare("select * from NonBoursier where NonBoursier.idEtu=:idEtu");
            $zx = $pre->execute(array(':idEtu' => $y));
            $z=$zx;
            while ($row = $pre->fetch()) {
                $z = $row['idEtu'];
                //break;
            }
            //var_dump($z);
            

            if ($z!=0 || $z!=NULL) {
                $requete = "DELETE FROM NonBoursier where idEtu=:idEtu";
                $stmt = $this->getPDO()->prepare($requete);
                $resu = $stmt->execute(array(':idEtu' =>$z));
                //var_dump($resu);

                $pre1 = $this->getPDO()->prepare("select * from Situation where libelle=:idlibelle");
                $xy = $pre1->execute(array(':idlibelle' => $objet->getLibelle()));
                $ter=$xy;
                while ($row = $pre1->fetch()) {
                    $ter = $row['idtype'];
                    //break;
                }
                //var_dump($ter);

                $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                $res = $this->getPDO()->prepare($requete);
                $res->execute(array($y, $ter));

                $res = $this->getPDO()->prepare("select idbour from Boursier order by idEtu DESC");
                $idboursier = $res->execute(array());
                while ($row = $res->fetch()) {
                    $idboursier = $row['idbour'];
                    break;
                }

                ////var_dump($idboursier);

                $res = $this->getPDO()->prepare("select idbat from Batiment where numbat=:numbat");
                $idbatiment = $res->execute(array(':numbat' => $objet->getBatiment()));

                while ($row = $res->fetch()) {
                    $idbatiment = $row['idbat'];
                    break;
                }

                ////var_dump($idboursier);

                $res = $this->getPDO()->prepare("select idcham from Chambre where numcham=:numcham and idbat=:idbat");
                $idchambre = $res->execute(array(':numcham' => $objet->getChambre(), ':idbat' => $idbatiment));

                while ($row = $res->fetch()) {
                    $idchambre = $row['idcham'];
                    break;
                }

                ////var_dump($idchambre);

                $requete = "INSERT INTO Loger (idbour,idEtu, idcham) VALUE (?,?,?)";
                $res = $this->getPDO()->prepare($requete);
                $donnee = $res->execute(array($idboursier, $y, $idchambre));
                ////var_dump($donnee);

                return $donnee;

            }else {
                $pres = $this->getPDO()->prepare("select * from Loger where Loger.idEtu=:idEtu");
                $moi = $pres->execute(array(':idEtu' => $y));
                $log=$moi;
                while ($row = $pre->fetch()) {
                    $log = $row['idEtu'];
                    //break;
                }
                //var_dump($log);

                if ($log!=0 || $log != NULL) {
                    $pre = $this->getPDO()->prepare("select * from Boursier where Boursier.idEtu=:idEtu");
                    $zx = $pre->execute(array(':idEtu' => $y));
                    $z=$zx;
                    while ($row = $pre->fetch()) {
                        $z = $row['idbour'];
                        //break;
                    }
                    //var_dump($z);

                    $pre1 = $this->getPDO()->prepare("select * from Situation where libelle=:idlibelle");
                    $xy = $pre1->execute(array(':idlibelle' => $objet->getLibelle()));
                    $ter=$xy;
                    while ($row = $pre1->fetch()) {
                        $ter = $row['idtype'];
                        //break;
                    }
                    //var_dump($ter);
                    if ($zx) {
                        $requete = "UPDATE Boursier SET idbour=:idbour, idEtu=:idEtu, idtype=:idtype  where idbour=:idbour";
                        $res = $this->getPDO()->prepare($requete);
                        $donne = $res->execute(array(':idbour' => $z, ':idEtu' => $y, ':idtype' => $ter));
                        //var_dump($donne);
                    }

                    $res = $this->getPDO()->prepare("select * from Batiment where numbat=:numbat");
                    $don = $res->execute(array(':numbat' => $objet->getBatiment()));
                    $idbat=$don;
                    while ($row = $res->fetch()) {
                        $idbat = $row['idbat'];
                        //break;
                    }
                    //var_dump($idbat);

                    $pre2 = $this->getPDO()->prepare("select * from Chambre where numcham=:numcham AND idbat=:idbat");
                    $xyz = $pre2->execute(array(':numcham' => $objet->getChambre(), ':idbat' => $idbat));
                    $terre=$xyz;
                    while ($row = $pre2->fetch()) {
                        $terre = $row['idcham'];
                        //break;
                    }
                    //var_dump($terre);

                    if ($zx) {
                        $requete = "UPDATE Loger SET idbour=:idbour, idEtu=:idEtu, idcham=:idcham  where idbour=:idbour";
                        $res = $this->getPDO()->prepare($requete);
                        $donne = $res->execute(array(':idbour' => $z, ':idEtu' => $y, ':idcham' => $terre));
                        //var_dump($donne);
                    }
                }
                else {
                    $pre = $this->getPDO()->prepare("select * from Boursier where Boursier.idEtu=:idEtu");
                    $zx = $pre->execute(array(':idEtu' => $y));
                    $z=$zx;
                    while ($row = $pre->fetch()) {
                        $z = $row['idbour'];
                        //break;
                    }
                    //var_dump($z);

                    $pre1 = $this->getPDO()->prepare("select * from Situation where libelle=:idlibelle");
                    $xy = $pre1->execute(array(':idlibelle' => $objet->getLibelle()));
                    $ter=$xy;
                    while ($row = $pre1->fetch()) {
                        $ter = $row['idtype'];
                        //break;
                    }
                    //var_dump($ter);
                    if ($zx) {
                        $requete = "UPDATE Boursier SET idbour=:idbour, idEtu=:idEtu, idtype=:idtype  where idbour=:idbour";
                        $res = $this->getPDO()->prepare($requete);
                        $donne = $res->execute(array(':idbour' => $z, ':idEtu' => $y, ':idtype' => $ter));
                        //var_dump($donne);
                    }

                    $res = $this->getPDO()->prepare("select * from Batiment where numbat=:numbat");
                    $don = $res->execute(array(':numbat' => $objet->getBatiment()));
                    $idbat=$don;
                    while ($row = $res->fetch()) {
                        $idbat = $row['idbat'];
                        //break;
                    }
                    //var_dump($idbat);

                    $pre2 = $this->getPDO()->prepare("select * from Chambre where numcham=:numcham AND idbat=:idbat");
                    $xyz = $pre2->execute(array(':numcham' => $objet->getChambre(), ':idbat' => $idbat));
                    $terre=$xyz;
                    while ($row = $pre2->fetch()) {
                        $terre = $row['idcham'];
                        //break;
                    }
                    //var_dump($terre);

                    if ($zx) {
                        $requete = "INSERT INTO Loger (idbour=:idbour ,idEtu=:idEtu, idcham=:idcham  VALUES(?,?,?)";
                        $res = $this->getPDO()->prepare($requete);
                        $donne = $res->execute(array($z, $y,$terre));
                        //var_dump($donne);
                    }
                }
            }
        }
    }

    public function supprimer($matricule) {
        $requete = "DELETE FROM Etudiant WHERE matricule=:matricule";
        $res = $this->getPDO()->prepare($requete);
        $res->execute(array(':matricule' => $matricule));
    }
}
