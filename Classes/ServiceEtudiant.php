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
        public function connexion($db_name="MiniProjetPHPOO",$db_user='root',$db_pass='Moimeme2018',$db_host='localhost')
        {
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_host = $db_host;
        }

        public function getPDO(){
            if ($this->pdo === null) {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=MiniProjetPHPOO','root','Moimeme2018');
                $this->pdo = $pdo;
            }
            //echo "true";
            return $this->pdo;
        }

        public function findAll($table)
        {
            if ($table=="Etudiant") {
                $resultat = "SELECT * FROM $table";
                $res = $this->getPDO()->query($resultat);
                //$p = $res->fetchAll(pdo::FETCH_ASSOC);
                return $res;
            } else if($table == "Boursier" || $table == "NonBoursier") {
                
                $resultat = "SELECT matricule, nom, prenom, mail, tel, ddn FROM $table , Etudiant where $table.idEtu=Etudiant.idEtu";
                $res = $this->getPDO()->query($resultat);
                //$p = $res->fetchAll(pdo::FETCH_ASSOC);
                return $res;
            }
            else if($table == "Loger") {
                
                $resultat = "SELECT matricule, nom, prenom, mail, tel, ddn FROM $table , Etudiant where $table.idEtu=Etudiant.idEtu";
                $res = $this->getPDO()->query($resultat);
                //$p = $res->fetchAll(pdo::FETCH_ASSOC);
                return $res;
            }
            
        }

        public function find($table, $matricule){
            
            $requete = "select * from $table where matricule=:matricule";
            $res = $this->getPDO()->prepare($requete);
            $res ->execute(array(':matricule' => $matricule));
            //$p = $res->fetch(pdo::FETCH_ASSOC);
            return $res;
        }


        public function add(Etudiant $objet)
        {
            $requete = "INSERT INTO Etudiant (matricule, nom, prenom, mail, tel, ddn) VALUE (?,?,?,?,?,?)";
            //$requete = "insert into Etudiant Set matricule=:matricule, nom=:nom, prenom=:prenom, mail=:mail, tel=:tel, ddn=:ddn";
            $res = $this->getPDO()->prepare($requete);
            //var_dump($res);
            $yx = $res->execute(array($objet->getMatricule(), $objet->getNom(), $objet->getPrenom(), $objet->getMail(), $objet->getTel(), $objet->getDdn()));
            //var_dump($donnee);

            $pre = $this->getPDO()->prepare("select idEtu from Etudiant order by idEtu DESC");
            $y= $pre->execute(array());
            while($row = $pre->fetch()){
                $y=$row['idEtu']; 
                break;
            }
            //var_dump($y);

            if (get_class($objet)=="NonBoursier") {
                if ($yx) {
                    $requete = "insert into NonBoursier Set idEtu=:idEtu, Adresse=:Adresse";
                    $res = $this->getPDO()->prepare($requete);
                    $donnee = $res ->execute(array(':idEtu' => $y, ':Adresse' => $objet->getAdresse()));
                    //$donnee = $res->fetch(pdo::FETCH_ASSOC);
                    //var_dump($res);
                    return $donnee;
                }
            }
             elseif(get_class($objet)=="Boursier"){

                if ($yx) {
                    $requete = "select idtype from Situation where libelle=:libelle";
                    $res = $this->getPDO()->prepare($requete);

                    $z= $res->execute(array(':libelle' => $objet->getLibelle()));
                    while($row = $res->fetch()){
                        $z=$row['idtype']; 
                        break;
                    }
                    //var_dump($z);

                    $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                    $res = $this->getPDO()->prepare($requete);
                    //var_dump($res);
                    $donnee = $res->execute(array($y, $z));
                    //$donnee = $res->fetch();
                    return $donnee;
                }
            }
            elseif(get_class($objet)=="Loger") {
                if ($yx) {
                    $requete = "select idtype from Situation where libelle=:libelle";
                    $res = $this->getPDO()->prepare($requete);

                    $z= $res->execute(array(':libelle' => $objet->getLibelle()));
                    while($row = $res->fetch()){
                        $z=$row['idtype']; 
                        break;
                    }

                    $requete = "INSERT INTO Boursier (idEtu,idtype) VALUE (?,?)";
                    $res = $this->getPDO()->prepare($requete);
                    $res->execute(array($y, $z));

                    $res = $this->getPDO()->prepare("select idbour from Boursier order by idEtu DESC");
                    $idboursier= $res->execute(array());
                    while($row = $res->fetch()){
                        $idboursier=$row['idbour']; 
                        break;
                    }

                    //var_dump($idboursier);

                    $res = $this->getPDO()->prepare("select idbat from Batiment where numbat=:numbat");
                    $idbatiment= $res->execute(array(':numbat' => $objet->getBatiment()));

                    while($row = $res->fetch()){
                        $idbatiment=$row['idbat']; 
                        break;
                    }

                    //var_dump($idboursier);

                    $res = $this->getPDO()->prepare("select idcham from Chambre where numcham=:numcham and idbat=:idbat");
                    $idchambre= $res->execute(array(':numcham' => $objet->getChambre() , ':idbat' =>$idbatiment));

                    while($row = $res->fetch()){
                        $idchambre=$row['idcham']; 
                        break;
                    }

                    //var_dump($idchambre);

                    $requete = "INSERT INTO Loger (idbour,idEtu, idcham) VALUE (?,?,?)";
                    $res = $this->getPDO()->prepare($requete);
                    $donnee = $res->execute(array($idboursier,$y,$idchambre));
                    //var_dump($donnee);

                    return $donnee;
                }

            }
            
        }   

        public function findBoursier($table){
            $requete = "select * from Etudiant, $table where Etudiant.idEtu=$table.idEtu";
            $res = $this->getPDO()->prepare($requete);
            $res ->execute();
                //$donnee = $res->fetch(pdo::FETCH_ASSOC);
            return $res;            
        }

        public function addplus($table){
            if ($table=="Batiment") {
                $requete = "INSERT INTO $table (numbat) VALUE (?)";
                $res = $this->getPDO()->prepare($requete);
                $yx = $res->execute();
            } else {
                # code...
            }
            
        }

        public function checkStatut($matricule){
            $requete = "select * from ";
            $res = $this->getPDO()->prepare($requete);
            $res ->execute();
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
    }

?>