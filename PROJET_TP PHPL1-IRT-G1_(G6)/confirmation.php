<?php
session_start();
require_once("connexion.php");

// Vérifier si le panier est vide
if (!empty($_SESSION['panier'])) {
    header("location: panier.php");
    exit();
}

$panier = $_SESSION['panier'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <script src="JS/commande.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande globale</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
    </style>
</head>
<body>

<h1>Commande globale</h1>

<table>
    <tr>
        <th>Produit</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>
    <?php
    

foreach ($_SESSION['panier'] as $produit) {
    // Vérifier que la quantité est bien un nombre valide
    if (!isset($produit['quantite']) || !is_numeric($produit['quantite']) || $produit['quantite'] <= 0) {
        die("Erreur : La quantité du produit n'est pas valide.");
    }

    // Récupérer les détails du produit
    $id_produit = $produit['id'];
    $nom_produit = $produit['nom'];
    $prix_original = floatval($produit['prix']);
    $quantite = intval($produit['quantite']);

    // Calcul de la remise
    $req = "SELECT remise FROM produits WHERE id = " . $id_produit;
    $resultat = mysqli_query($link, $req);
    $produit_bd = mysqli_fetch_assoc($resultat);

    $remise_pourcent = isset($produit_bd['remise']) ? floatval($produit_bd['remise']) : 0;

    // Calcul du prix avec remise
    $prix_remise = $prix_original * (1 - $remise_pourcent / 100);
    $sous_total = $prix_remise * $quantite;
    $total_ht += $sous_total;

        echo "<tr>
                <td>{$produit['nom']}</td>
                <td>" . number_format($prix_remise, 0, ',', ' ') . " FCFA</td>
                <td>$quantite</td>
                <td>" . number_format($sous_total, 0, ',', ' ') . " FCFA</td>
              </tr>";
    }
    ?>
    <tr>
        <td colspan="3">Total</td>
        <td><?= $total_ht ?> FCFA</td>
    </tr>
</table>

<h1>Informations de Livraison</h1>
<form action="finaliser.php" method="post">
    <label>Nom complet :</label>
    <input type="text" name="nom" required><br>

    <label>Adresse :</label>
    <input type="text" name="adresse" required><br>

    <label>Téléphone :</label>
    <input type="tel" name="telephone" required><br>

    <label>Méthode de paiement :</label>
    <select name="paiement">
        <option value="cash">Paiement à la livraison</option>
        <option value="mobile">Paiement mobile</option>
    </select><br>

    <button type="submit">Confirmer la commande</button>
</form>

<a href="panier.php">Retour au panier</a>

</body>
</html>

<?php mysqli_close($link); ?>