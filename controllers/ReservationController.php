<?php

require_once __DIR__ . '/../models/ReservationModel.php';

class ReservationController
{
    private ReservationModel $model;

  
    private const TARIFS = [
        'STANDARD' => 25000,
        'CONFORT'  => 50000,
        'SUITE'    => 100000,
    ];

    public function __construct()
    {
        $this->model = new ReservationModel();
    }

   
    public function CreateReservation(array $data): array
    {
        $nomClient     = trim($data['nom_client'] ?? '');
        $numeroChambre = (int) ($data['numero_chambre'] ?? 0);
        $nombreNuits   = (int) ($data['nombre_nuits'] ?? 0);
        $typeChambre   = strtoupper(trim($data['type_chambre'] ?? ''));

        if ($nomClient === '') {
            return ['success' => false, 'message' => "Le nom du client est obligatoire."];
        }

        if ($numeroChambre <= 0) {
            return ['success' => false, 'message' => "Le numéro de chambre doit être supérieur à 0."];
        }

        if ($nombreNuits <= 0) {
            return ['success' => false, 'message' => "Le nombre de nuits doit être supérieur à 0."];
        }

        if (!array_key_exists($typeChambre, self::TARIFS)) {
            return ['success' => false, 'message' => "Type de chambre invalide. Valeurs acceptées : STANDARD, CONFORT, SUITE."];
        }

        $ok = $this->model->create($nomClient, $numeroChambre, $nombreNuits, $typeChambre);

        if ($ok) {
            return ['success' => true, 'message' => "Réservation créée avec succès pour {$nomClient}."];
        }

        return ['success' => false, 'message' => "Erreur lors de la création de la réservation."];
    }

    public function ListActiveReservations(): array
    {
        return $this->model->getActive();
    }

   
    public function CancelReservation(int $id): array
    {
        if ($id <= 0) {
            return ['success' => false, 'message' => "Identifiant invalide."];
        }

        if (!$this->model->existsActive($id)) {
            return ['success' => false, 'message' => "Aucune réservation active trouvée avec l'ID {$id}."];
        }

        $ok = $this->model->cancel($id);

        if ($ok) {
            return ['success' => true, 'message' => "Réservation #{$id} annulée avec succès."];
        }

        return ['success' => false, 'message' => "Erreur lors de l'annulation de la réservation."];
    }

  
    public function CalculerChiffreAffaires(): float
    {
        return $this->model->GetChiffreAffaires();
    }

   
    public function GetSejourLePlusLong(): array
    {
        return $this->model->GetLongestStay();
    }
}