<?php

class Database
{
    private ?PDO $connexion = null;

    public function GetConnexion(): PDO
    {
        if ($this->connexion === null) {
            $host = "127.0.0.1";
            $port = "5432";
            $dbname = "exam";
            $user = "postgres";
            $password = "101210";

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

            try {
                $this->connexion = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return $this->connexion;
    }

    public function CloseConnexion(): void
    {
        $this->connexion = null;
    }
}