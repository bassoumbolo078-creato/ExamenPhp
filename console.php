<?php



require_once __DIR__ . '/controllers/ReservationController.php';
require_once __DIR__ . '/views/console/menu.php';
require_once __DIR__ . '/views/console/list.php';

$controller = new ReservationController();

$continuer = true;

while ($continuer) {
    $choix = AfficherMenu();
    

    switch ($choix) {

        case 1: 
            $reservationData =SaisirReservation();

            $resultat = $controller->CreateReservation([
                'nom_client'     => $reservationData['nom_client'],
                'numero_chambre' => $reservationData['numero_chambre'],
                'nombre_nuits'   => $reservationData['nombre_nuits'],
                'type_chambre'   => $reservationData['type_chambre'],
            ]);

            AfficherMessage($resultat);
            break;

        case 2:
            $reservations = $controller->ListActiveReservations();
            AfficherReservations($reservations);
            break;

        case 3: 
            $id = (int) readline("ID de la reservation a annuler : ");
            $resultat = $controller->CancelReservation($id);
            AfficherMessage($resultat);
            break;

        case 4:
            $ca = $controller->CalculerChiffreAffaires();
            AfficherChiffreAffaires($ca);
            break;

        case 5: 
            $sejourLong = $controller->GetSejourLePlusLong();
            AfficherSejourLePlusLong($sejourLong);
            break;

        case 0: 
            echo "\nAu revoir !\n";
            $continuer = false;
            break;

        default:
            echo "\nChoix invalide, veuillez reessayer.\n";
            break;
    }
}