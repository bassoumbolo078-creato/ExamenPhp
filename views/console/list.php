<?php
 function AfficherReservations(array $reservations): void
{
    if (empty($reservations)) {
        echo "\nAucune reservation active pour le moment.\n";
        return;
    }
foreach ($reservations as $r) {
    echo "ID : " . $r['id'] . "\n";
    echo "Client : " . $r['nom_client'] . "\n";
    echo "Chambre : " . $r['numero_chambre'] . "\n";
    echo "Nombre de nuits : " . $r['nombre_nuits'] . "\n";
    echo "Type : " . $r['type_chambre'] . "\n";
    echo "Statut : " . $r['statut'] . "\n\n";
}
}

 function AfficherChiffreAffaires(float $ca): void
{
   echo "\nChiffre d'affaires prévisionnel : $ca FCFA\n";
}

 function AfficherSejourLePlusLong(array $reservations): void
{
    if (empty($reservations)) {
        echo "\nAucune reservation active.\n";
        return;
    }

 

}