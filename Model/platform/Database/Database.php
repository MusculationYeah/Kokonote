<?php

//namespace \Model\platform\Database\Database.php;
use \PDO;

class Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function _construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {

        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
        $this->$db_host = $db_host;
    }

    private function getPDO() {

        if ($this->pdo == null) {
            try {
                $npdo = new PDO('mysql:dbname=kokonote; host=localhost', 'root');
                $npdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $npdo;
                var_dump("PDO iitialize");
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données :" . $e->getMessage());
            }
        }
        var_dump("PDO called");
        return $this->pdo;
    }

    public function query($statement) {
        $req = $this->getPDO()->query($statement);
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
