<?php

class BaseModel {
    protected $Connextion;

    public function connect() {
        if (!$this->Connextion) {
            try {
                $host = 'localhost';
                $dbname = 'veille';
                $username = 'root';
                $password = '';

                $this->Connextion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $this->Connextion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connexion echouee : " . $e->getMessage());
            }
        }
    }
}
?>
