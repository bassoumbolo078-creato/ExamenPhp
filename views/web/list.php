<?php

?>
<section class="card">
    <h2>Réservations actives</h2>

    <?php if (!empty($cancelMessage)): ?>
        <p class="alert <?= $cancelMessage['success'] ? 'alert-success' : 'alert-error' ?>">
            <?= htmlspecialchars($cancelMessage['message']) ?>
        </p>
    <?php endif; ?>

    <?php if (empty($reservations)): ?>
        <p class="info">Aucune réservation active pour le moment.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Chambre</th>
                    <th>Nuits</th>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['id']) ?></td>
                        <td><?= htmlspecialchars($r['nom_client']) ?></td>
                        <td><?= htmlspecialchars($r['numero_chambre']) ?></td>
                        <td><?= htmlspecialchars($r['nombre_nuits']) ?></td>
                        <td><?= htmlspecialchars($r['type_chambre']) ?></td>
                        <td><?= htmlspecialchars($r['statut']) ?></td>
                        <td>
                            <form method="POST" action="index.php?action=cancel" style="margin:0;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
                                <button type="submit" class="btn-danger">Annuler</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<section class="card">
    <h2>Chiffre d'affaires prévisionnel</h2>
    <p class="highlight"><?= number_format($chiffreAffaires, 0, ',', ' ') ?> FCFA</p>
</section>

<section class="card">
    <h2>Séjour le plus long</h2>
    <?php if (empty($sejourLong)): ?>
        <p class="info">Aucune réservation active.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($sejourLong as $r): ?>
                <li>
                    <?= htmlspecialchars($r['nom_client']) ?> — Chambre <?= htmlspecialchars($r['numero_chambre']) ?>
                    — <?= htmlspecialchars($r['nombre_nuits']) ?> nuits (<?= htmlspecialchars($r['type_chambre']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>