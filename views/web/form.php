<?php

?>
<section class="card">
    <h2>Nouvelle réservation</h2>

    <?php if (!empty($message)): ?>
        <p class="alert <?= $message['success'] ? 'alert-success' : 'alert-error' ?>">
            <?= htmlspecialchars($message['message']) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="index.php?action=create">
        <label>
            Nom du client
            <input type="text" name="nom_client" required>
        </label>

        <label>
            Numéro de chambre
            <input type="number" name="numero_chambre" min="1" required>
        </label>

        <label>
            Nombre de nuits
            <input type="number" name="nombre_nuits" min="1" required>
        </label>

        <label>
            Type de chambre
            <select name="type_chambre" required>
                <option value="STANDARD">STANDARD (25 000 FCFA / nuit)</option>
                <option value="CONFORT">CONFORT (50 000 FCFA / nuit)</option>
                <option value="SUITE">SUITE (100 000 FCFA / nuit)</option>
            </select>
        </label>

        <button type="submit">Réserver</button>
    </form>
</section>