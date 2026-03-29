<?php
session_start();
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_de_la_base = "produits";

// Établir la connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $nom_de_la_base);

// Vérifier si la connexion a réussi
if (!$connexion) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

try {
    // Récupérer la liste de tous les produits depuis la base de données
    $requete_sql = "SELECT id, nom, photo FROM produits";
    $resultat = mysqli_query($connexion, $requete_sql);

    if (!$resultat) {
        throw new Exception("Erreur lors de la récupération des produits : " . mysqli_error($connexion));
    }

    $produits = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    mysqli_free_result($resultat);

} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <header>
        <h1>Nos Produits</h1>
    </header>
    <main>
        <ul class="product-list">
            <?php if (!empty($produits)): ?>
                <?php foreach ($produits as $produit): ?>
                    <li class="product-item">
                        <a href="produit.php?id=<?php echo $produit['id']; ?>">
                            <img src="<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>">
                            <h3><?php echo $produit['nom']; ?></h3>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun produit disponible.</p>
            <?php endif; ?>
        </ul>
    </main>
    <footer>
        <p>&copy; Mon Site E-commerce</p>
    </footer>
</body>
</html>
