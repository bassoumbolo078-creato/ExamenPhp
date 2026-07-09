<?php



require_once __DIR__ . '/controllers/ReservationController.php';

$controller = new ReservationController();
$action = $_GET['action'] ?? 'list';

$message = null;
$cancelMessage = null;

switch ($action) {

    case 'form':
      
        $content = null;
        ob_start();
        require __DIR__ . '/views/web/form.php';
        $content = ob_get_clean();
        break;

    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $controller->createReservation($_POST);
        }
        ob_start();
        require __DIR__ . '/views/web/form.php';
        $content = ob_get_clean();
        break;

    case 'cancel':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['id'] ?? 0);
            $cancelMessage = $controller->CancelReservation($id);
        }
        $reservations = $controller->ListActiveReservations();
        $chiffreAffaires = $controller->CalculerChiffreAffaires();
        $sejourLong = $controller->GetSejourLePlusLong();
        ob_start();
        require __DIR__ . '/views/web/list.php';
        $content = ob_get_clean();
        break;

    case 'list':
    default:
        $reservations = $controller->ListActiveReservations();
        $chiffreAffaires = $controller->CalculerChiffreAffaires();
        $sejourLong = $controller->GetSejourLePlusLong();
        ob_start();
        require __DIR__ . '/views/web/list.php';
        $content = ob_get_clean();
        break;
}

require __DIR__ . '/views/web/layout.php';