<?php
session_start();


// Vérifier si le panier existe, sinon le créer
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Supprimer un produit du panier via AJAX
if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    foreach ($_SESSION['panier'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['panier'][$key]);
            break;
        }
    }
    $_SESSION['panier'] = array_values($_SESSION['panier']); // Réindexer le tableau
    echo json_encode(['message' => 'Produit supprimé', 'panier' => $_SESSION['panier']]);
    exit;
}

// Vider le panier
if (isset($_GET['vider'])) {
    $_SESSION['panier'] = [];
}

// Ajouter un produit au panier
if (isset($_POST['id']) && isset($_POST['quantite'])) {
    $id = $_POST['id'];
    $quantite = intval($_POST['quantite']);

    $produit_trouve = false;
    // Vérifier si le produit existe déjà dans le panier
    foreach ($_SESSION['panier'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantite'] += $quantite; // Incrémenter la quantité
            $produit_trouve = true;
            break;
        }
    }
    
    if (!$produit_trouve) {
        // Si le produit n'existe pas encore, on l'ajoute
        $req = "SELECT nom, photo, prix FROM produits WHERE id = $id";
        $resultat = mysqli_query($link, $req);
        if ($produit = mysqli_fetch_assoc($resultat)) {
            $_SESSION['panier'][] = [
                'id' => $id,
                'nom' => $produit['nom'],
                'photo' => $produit['photo'],
                'prix' => $produit['prix'],
                'quantite' => $quantite
            ];
        }
    }
    echo json_encode(['message' => 'Produit ajouté au panier']);
    exit;
}

// Modifier la quantité d'un produit
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    foreach ($_SESSION['panier'] as &$item) {
        if ($item['id'] == $id) {
            if ($action == 'augmenter') {
                $item['quantite']++;
            } elseif ($action == 'diminuer' && $item['quantite'] > 1) {
                $item['quantite']--;
            }
            break;
        }
    }
    echo json_encode(['quantite' => $item['quantite'], 'total' => $item['prix'] * $item['quantite']]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="fj_1">

<header>
    <h1 class="fj_2">Votre Panier</h1>
    <a href="index.php?page=hans" class="fj_9">Retour aux produits</a>
</header>

<div class="fj_8">
    <?php if (!empty($_SESSION['panier'])): ?>
        <table class="fj_3">
            <tr class="fj_6">
                <th class="fj_4">Image</th>
                <th class="fj_4">Nom</th>
                <th class="fj_4">Prix Unitaire</th>
                <th class="fj_4">Quantité</th>
                <th class="fj_4">Total</th>
                <th class="fj_4">Action</th>
            </tr>
            <?php
            $total_general = 0;
            foreach ($_SESSION['panier'] as $item):
                $total_produit = $item['prix'] * $item['quantite'];
                $total_general += $total_produit;
            ?>
                <tr class="fj_6" data-id="<?= $item['id'] ?>">
                    <td class="fj_5"><img class="fj_7" src="<?= htmlspecialchars($item['photo']) ?>" alt="<?= htmlspecialchars($item['nom']) ?>"></td>
                    <td class="fj_5"><?= htmlspecialchars($item['nom']) ?></td>
                    <td class="fj_5"><?= htmlspecialchars($item['prix']) ?> FCFA</td>
                    <td class="fj_5">
                        <a href="javascript:void(0);" class="fj_9 modifier-quantite" data-action="diminuer">-</a>
                        <span class="quantite"><?= $item['quantite'] ?></span>
                        <a href="javascript:void(0);" class="fj_9 modifier-quantite" data-action="augmenter">+</a>
                    </td>
                    <td class="fj_5"><span class="total"><?= $total_produit ?> FCFA</span></td>
                    <td class="fj_5"><a href="javascript:void(0);" class="fj_9 supprimer-produit" data-id="<?= $item['id'] ?>">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
            <tr class="fj_6">
                <td class="fj_5" colspan="4"><strong>Total Général</strong></td>
                <td class="fj_5"><strong><span id="total-general"><?= $total_general ?> FCFA</span></strong></td>
                <td class="fj_5"></td>
            </tr>
        </table>
        <a href="panier.php?vider=1" class="fj_9">Vider le panier</a>
        <a href="1index.php" class="fj_9">
            Passer ma commande
        </a>
    <?php else: ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour gérer l'augmentation et la diminution de la quantité
        function modifierQuantite(event) {
            const action = event.target.dataset.action;
            const row = event.target.closest('tr');
            const id = row.dataset.id;
            const quantiteElement = row.querySelector('.quantite');
            const totalElement = row.querySelector('.total');

            const formData = new FormData();
            formData.append('modifier', true);
            formData.append('id', id);
            formData.append('action', action);

            fetch('panier.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                quantiteElement.textContent = data.quantite;
                totalElement.textContent = `${data.total} FCFA`;
                updateTotal();  // Mise à jour du total général après la modification
            });
        }

        // Fonction pour supprimer un produit
        function supprimerProduit(event) {
            const id = event.target.dataset.id;
            const row = event.target.closest('tr');

            const formData = new FormData();
            formData.append('supprimer', id);

            fetch('panier.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                row.remove();
                updateTotal();  // Mise à jour du total général après suppression
            });
        }

        // Fonction pour mettre à jour le total général
        function updateTotal() {
            let totalGeneral = 0;
            const totals = document.querySelectorAll('.total');
            totals.forEach(total => {
                totalGeneral += parseFloat(total.textContent.replace(' FCFA', ''));
            });
            const totalRow = document.getElementById('total-general');
            totalRow.textContent = `${totalGeneral} FCFA`;
        }

        // Écouter les événements pour l'incrémentation et la décrémentation
        const modifierQuantiteButtons = document.querySelectorAll('.modifier-quantite');
        modifierQuantiteButtons.forEach(button => {
            button.addEventListener('click', modifierQuantite);
        });

        // Écouter les événements pour supprimer un produit
        const supprimerButtons = document.querySelectorAll('.supprimer-produit');
        supprimerButtons.forEach(button => {
            button.addEventListener('click', supprimerProduit);
        });
    });

   



</script>

</body>
</html>
