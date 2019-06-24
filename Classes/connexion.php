<?php

//use \PDO;

class ConnectBD
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name='MiniProjetPHPOO',$db_user='root',$db_pass='Moimeme2018',$db_host='localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO(){
        $pdo = new PDO('mysql:dbname=MiniProjetPHPOO;host=loacalhost', 'root','Moimeme2018');
        $this->pdo = $pdo;
        return $this->pdo;
    }

    /*public function query($resultat)
    {
        $res = $this->getPDO()->query($resultat);
        $donnee = $res->fetchAll(PDO::FETCH_OBJ);
        return $donnee;
    }*/
}
?>