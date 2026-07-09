<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des réservations d'hôtel</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
            color: #222;
        }
        header {
            max-width: 900px;
            margin: 0 auto 20px auto;
        }
        header h1 { color: #1a4d8f; }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #1a4d8f;
            font-weight: bold;
        }
        .card {
            max-width: 900px;
            margin: 0 auto 20px auto;
            background: #fff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        label { display: block; margin-bottom: 12px; font-weight: bold; }
        input, select {
            display: block;
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background: #1a4d8f;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button:hover { background: #123a6b; }
        .btn-danger { background: #c0392b; padding: 6px 12px; }
        .btn-danger:hover { background: #922b21; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #eee; }
        th { background: #f0f3f7; }
        .alert { padding: 10px 15px; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
        .info { color: #666; font-style: italic; }
        .highlight { font-size: 24px; font-weight: bold; color: #1a4d8f; }
    </style>
</head>
<body>
<header>
    <h1>Gestion des réservations d'hôtel</h1>
    <nav>
        <a href="index.php?action=form">Nouvelle réservation</a>
        <a href="index.php?action=list">Réservations actives</a>
    </nav>
</header>

<?php echo $content; ?>

</body>
</html>