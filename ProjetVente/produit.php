<?php
session_start();
require_once("connexion.php");

// Fonction d'ajout au panier
if (isset($_POST['id']) && isset($_POST['quantite'])) {
    $id = $_POST['id'];
    $quantite = intval($_POST['quantite']);

    // Vérifier que l'ID du produit est valide
    $req = "SELECT id, nom, photo, prix FROM produits WHERE id = " . $id;
    $resultat = mysqli_query($link, $req);

    if ($produit = mysqli_fetch_assoc($resultat)) {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        $found = false;
        foreach ($_SESSION['panier'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantite'] += $quantite; // Incrémenter la quantité
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $_SESSION['panier'][] = [
                'id' => $id,
                'nom' => $produit['nom'],
                'photo' => $produit['photo'],
                'prix' => $produit['prix'],
                'quantite' => $quantite
            ];
        }

        // Retourner le nombre total d'articles dans le panier
        echo json_encode(['status' => 'success', 'message' => 'Produit ajouté au panier!', 'total' => array_sum(array_column($_SESSION['panier'], 'quantite'))]);
    }
}

$id_produit = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id_produit) {
    // Utilisation d'une requête préparée pour la sécurité
    $req = "SELECT id, nom, photo, prix, detail FROM produits WHERE id =" . $id_produit;
    $resultat = mysqli_query($link, $req);

    if ($produit = mysqli_fetch_assoc($resultat)) {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $produit['nom']; ?></title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <header>
                <?php include("haut.php"); ?>
            </header>
            <h1 class="h-h1"><?php echo $produit['nom']; ?></h1>
            <section class="h-el">
                <div class="product-image">
                    <img src="<?php echo $produit['photo']; ?>" alt="<?php echo $produit['nom']; ?>">
                </div>
                <p class="h-content"><?php echo $produit['detail'] ?></p>
            </section>

            <div class="product-info">
                <h2><?php echo $produit['nom'] ?></h2>
                <span class="product-price" id="prixUnitaire"><strong>Prix: </strong><?php echo $produit['prix'] ?> FCFA/Kg</span><br><br>

                <button class="bouton-ajouter-panier" data-id-produit="<?php echo $id_produit; ?>">Ajouter au panier</button>
                <p id="message-ajout" style="color: green; display: none;">Produit ajouté au panier !</p>

                <p class="lien"><a href="index.php?page=hans">Retour à la liste des produits</a></p>
            </div>

            <footer>
                <?php include("bas.php"); ?>
            </footer>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const ajouterPanierButton = document.querySelector('.bouton-ajouter-panier');
                    const messageAjout = document.getElementById('message-ajout');

                    ajouterPanierButton.addEventListener('click', function() {
                        const idProduit = this.getAttribute('data-id-produit');
                        const quantite = 1; // Quantité par défaut

                        const formData = new FormData();
                        formData.append('id', idProduit);
                        formData.append('quantite', quantite);

                        fetch('produit.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                messageAjout.style.display = 'block';
                                setTimeout(function() {
                                    messageAjout.style.display = 'none';
                                }, 3000); // Masquer après 3 secondes

                                // Optionnel: mettez à jour l'UI avec le total du panier
                                document.getElementById('total-panier').innerText = "Total: " + data.total + " articles";
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                        });
                    });
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Produit non trouvé.";
    }
}
?>
