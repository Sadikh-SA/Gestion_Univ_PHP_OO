<?php


    include 'Etudiant.php';
    include 'NonBoursier.php';/*
    include 'connexion.php';
    include 'Boursier.php';
    
    //include 'Situation.php';
    include 'Loger.php';
    include 'Chambre.php';
    include 'Batiment.php';*/

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
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=MiniProjetPHPOO', 'root','Moimeme2018');
                $this->pdo = $pdo;
            }
            //echo "true";
            return $this->pdo;
        }

        public function findAll($table)
        {
            $resultat = "SELECT * FROM $table";
            $res = $this->getPDO()->query($resultat);
            $p = $res->fetchAll(pdo::FETCH_ASSOC);
            return $p;
        }

        public function find($table, $matricule){
            /*
            $requete = "select * from $table where matricule=:matricule";
            $res = $this->getPDO()->prepare($requete);
            $res ->execute(array(':matricule' => $matricule));
            $p = $res->fetch(pdo::FETCH_ASSOC);
            return $p;*/
        }

        public function add(Etudiant $objet)
        {
            $requete = "INSERT INTO Etudiant (matricule, nom, prenom, mail, tel, ddn) VALUE (".$objet->getMatricule().", ".$objet->getNom().", ".$objet->getPrenom().", ".$objet->getMail().", ".$objet->getTel().", ".$objet->getDdn().")";
            //$requete = "insert into Etudiant Set matricule=:matricule, nom=:nom, prenom=:prenom, mail=:mail, tel=:tel, ddn=:ddn";
            $res = $this->getPDO()->exec($requete);
            var_dump($res);
            //$donnee = $res->execute(array($objet->getMatricule(), $objet->getNom(), $objet->getPrenom(), $objet->getMail(), $objet->getTel(), $objet->getDdn()));
            //  var_dump($donnee);
            /*$donnee = $res->fetchAll(PDO::FETCH_ASSOC);
            var_dump($donnee);*/
            $entite = $objet->getMatricule();
            var_dump($entite);
            //$pre = $this->getPDO()->lastInsertId();
            $pre = $this->getPDO()->prepare("select idEtu from Etudiant order by idEtu DESC");
            $y= $pre->execute(array());
            while($row = $pre->fetch()){
                $y=$row['idEtu']; 
                break;
            }
            var_dump($row['idEtu']);
            /*$y = $pre->fetchAll(pdo::FETCH_ASSOC);
            var_dump($y);*/
            
            //$x = $pre->fetch();
            //var_dump($x);
            
            
/*
            if (get_class($objet)=="NonBoursier") {
                $requete = "insert into NonBoursier Set idEtu=:idEtu, Adresse=:Adresse";
                $res = $this->getPDO()->prepare($requete);
                $res ->execute(array(':idEtu' => $y, ':Adresse' => $objet->getAdresse()));
                $donnee = $res->fetch(pdo::FETCH_ASSOC);
                return $donnee;
            }
/*
            } elseif(get_class($objet)=="Boursier"){
                $requete = "insert into NonBoursier Set idEtu=:idEtu , idtype=:idtype";
                $res = $this->getPDO()->prepare($requete);
                $y = 'select idtype from Situation where libelle=';
                //$res ->execute(array(':idEtu' => $x, ':idtype' => ));
                */
           // }
            
        }
/*
        public function findBoursier($id){
            $requete = "select * from Etudiant, Boursier where Etudiant.idEtu=Boursier.:id";
            $res = $this->getPDO()->prepare($requete);
            $res ->execute(array(':idbour' => $id));
            $donnee = $res->fetch(pdo::FETCH_ASSOC);
            return $donnee;
        }

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