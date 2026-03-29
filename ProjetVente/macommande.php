<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma commande</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
        require_once("haut.php");
        ?>
    </header>
    <section class="mm">
        <body class="sami">
            <h1 class="m-titre">
                Bienvenue Utilisateur,
                              nous sommes ravis de préparer votre commande de fruits exotique.
                <br>Merci de votre confiance!
            </h1>
            <p class="m-des">
                Votre sélection de fruits tropicaux est en route ! Voici un récapitulatif de votre commande pour que vous puissiez vérifier chaque détail.
            </p>

            <div class="m-1container">
                <div class="m-2order">
                    <div class="m-3orderitem">
                        <table class="ma">
                            <thead class="mb">
                                <tr>
                                    <th colspan="4" class="m-commande">Commande globale</th>
                                </tr>
                                <tr>
                                    <th class="m-th">Produit</th>
                                    <th class="m-th">Quantité</th>
                                    <th class="m-th">Prix unitaire</th>
                                    <th class="m-th">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_general = 0;

                                if (!empty($_SESSION['panier'])) {
                                    foreach ($_SESSION['panier'] as $item) {
                                        $total_produit = $item['prix'] * $item['quantite'];
                                        $total_general += $total_produit;
                                        ?>
                                        <tr class="mc">
                                            <td><?= htmlspecialchars($item['nom']) ?></td>
                                            <td><?= htmlspecialchars($item['quantite']) ?></td>
                                            <td><?= htmlspecialchars($item['prix']) ?> FCFA</td>
                                            <td><?= $total_produit ?> FCFA</td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Votre panier est vide.</td></tr>";
                                }
                                ?>
                                <tr class="m-7total">
                                    <td colspan="3"><strong>TOTAL</strong></td>
                                    <td class="m-8finalprice"><strong><?= $total_general ?> FCFA</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h1 class="m-info">Informations de livraison</h1>
                    <div class="m9form-section">
                     
                        <form id="contact" method="POST" action="facture/facture.php">
                            <div class="m-nom">
                                <div>
                                    <label for="nom">Nom:</label><br>
                                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>

                                    <label for="prenom">Prénom</label><br>
                                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                                </div>
                            </div>

                            <div class="m-tel">
                                <div>
                                    <label for="num">Numéro de téléphone:</label><br>
                                    <input type="tel" id="num" name="num" placeholder="Entrez votre numéro de téléphone" required>

                                    <label for="email">Email:</label><br>
                                    <input type="email" id="email" name="email" placeholder="exemple@exemple.com" required>
                                </div>
                            </div>

                            <label for="address">Adresse de livraison:</label>
                            <input type="text" id="address" name="address" placeholder="Entrez votre adresse" required>

                            <div class="m10">
                                <input type="text" id="city" name="city" placeholder="Ville" required>
                                <input type="text" id="departement" name="departement" placeholder="Département">
                            </div>

                            <label for="payment">Mode de paiement:</label>
                            <select name="payment" id="payment" required>
                                <option value="" disabled selected>Choisissez votre mode de paiement</option>
                                <option value="momopay">Mobile Money</option>
                                <option value="carte">Carte bancaire</option>
                                <option value="virement">Virement bancaire</option>
                                <option value="paiement à la livraison">Paiement à la livraison</option>
                            </select>

                            <div class="m11actions">
                                <button type="submit" class="m12"><a href="facture\facture.php"><strong class="m-de">Je commande</strong></a>
                                </button>
                            </div><br>
                    </div>

                          
                        </form>

                
                </div>
            </div>
            
            <section class="m-propro">
                <p class="m-proverbe">"Laissez l'exotisme ensoleiller votre journée"</p>
            </section>
        </body>
    </section>
</body>
<footer>
    <?php
require_once("bas.php");
?>
</footer>
</html>
