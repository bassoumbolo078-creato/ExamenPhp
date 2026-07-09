<?php


 function AfficherMenu(): int
{do {
  
    echo "   GESTION DES RESERVATIONS - HOTEL CLI  \n";
    echo "1. Creer une reservation\n";
    echo "2. Afficher les reservations actives\n";
    echo "3. Annuler une reservation\n";
    echo "4. Calculer le chiffre d'affaires previsionnel\n";
    echo "5. Afficher le sejour le plus long\n";
    echo "0. Quitter\n";
    $choix = readline("Votre choix : ");
    }while ($choix < 0 || $choix > 5);
    return  $choix;
}

 function AfficherMessage(array $resultat): void
{
    $prefixe = $resultat['success'] ? "[OK] " : "[ERREUR] ";
    echo "\n" . $prefixe . $resultat['message'] . "\n";
}


function SaisirReservation(): array
{
    $nomClient = readline("Nom du client : ");

    $numeroChambre = readline("Numero de chambre : ");

    $nombreNuits = readline("Nombre de nuits : ");

    echo "Type de chambre (STANDARD / CONFORT / SUITE) : ";
    $typeChambre = readline();

    return [
        'nom_client'     => $nomClient,
        'numero_chambre' => (int) $numeroChambre,
        'nombre_nuits'   => (int) $nombreNuits,
        'type_chambre'   => strtoupper(trim($typeChambre)),
    ];
}