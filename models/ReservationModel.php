<?php

require_once __DIR__ . '/Database.php';



class ReservationModel
{
    private PDO $pdo;
    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnexion();
    }
   
    public function create(string $nomClient, int $numeroChambre, int $nombreNuits, string $typeChambre): bool
    {
        $sql = "INSERT INTO reservations (nom_client, numero_chambre, nombre_nuits, type_chambre, statut)
                VALUES (:nom_client, :numero_chambre, :nombre_nuits, :type_chambre, 'VALIDEE')";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nom_client'     => $nomClient,
            ':numero_chambre' => $numeroChambre,
            ':nombre_nuits'   => $nombreNuits,
            ':type_chambre'   => $typeChambre,
        ]);
    }

    
    public function getActive(): array
    {
        $sql = "SELECT * FROM reservations WHERE statut = 'VALIDEE' ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

   
    public function existsActive(int $id): bool
    {
        $sql = "SELECT COUNT(*) FROM reservations WHERE id = :id AND statut = 'VALIDEE'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return (int) $stmt->fetchColumn() > 0;
    }

    public function Cancel(int $id): bool
    {
        $sql = "UPDATE reservations SET statut = 'ANNULEE' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }


public function GetChiffreAffaires(): float
{
    $sql = "SELECT SUM(
                nombre_nuits *
                CASE type_chambre
                    WHEN 'STANDARD' THEN 25000
                    WHEN 'CONFORT'  THEN 50000
                    WHEN 'SUITE'    THEN 100000
                END
            ) AS total
            FROM reservations
            WHERE statut = 'VALIDEE'";

    $stmt = $this->pdo->query($sql);
    $result = $stmt->fetchColumn();

    return $result !== null ? (float) $result : 0.0;
}

 
    public function getLongestStay(): array
    {
        $sql = "SELECT * FROM reservations
                WHERE statut = 'VALIDEE'
                AND nombre_nuits = (
                    SELECT MAX(nombre_nuits) FROM reservations WHERE statut = 'VALIDEE'
                )";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}