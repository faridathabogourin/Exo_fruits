<?php
session_start();
require('fpdf/fpdf.php');

// Vérifier si la commande existe
if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    die("Votre panier est vide.");
}

// Connexion à la base de données
require_once("../connexion.php");

// Classe personnalisée pour la facture
class FacturePDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, "FACTURE DE COMMANDE", 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Créer le PDF
$pdf = new FacturePDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
$pdf->Image("../image/logo.jpg", 100, 19, 15, 15);
$pdf->Cell(189, 5, '', '', 0, 14);
$pdf->Cell(189, 5, '', '', 0, 14);

// Entête pour la facture
$pdf->SetFont('Arial');
$pdf->Cell(189, 5, "EXO'FRUITS");
$pdf->Cell(189, 5, "+229 0144014690");

// Informations du client (à adapter selon vos besoins)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, "Informations du Client", 0, 1);
$pdf->SetFont('Arial', '', 10);

// Tableau des produits
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, "Détails de la Commande", 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(100, 7, 'Produit', 1);
$pdf->Cell(30, 7, 'Prix/kg', 1);
$pdf->Cell(30, 7, 'Quantité', 1);
$pdf->Cell(30, 7, 'Total', 1);
$pdf->Ln();

// Variables pour totaux
$total_ht = 0;
$total_remise = 0;

// Remplir le tableau des produits
$pdf->SetFont('Arial', '', 10);

// Parcours du panier
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

    // Calcul des totaux
    $total_ht += $sous_total;
    $total_remise += $prix_original * $quantite - $sous_total;

    // Ajouter au PDF
    $pdf->Cell(100, 7, $nom_produit, 1);
    $pdf->Cell(30, 7, number_format($prix_original, 2) . ' FCFA', 1);
    $pdf->Cell(30, 7, $quantite, 1);
    $pdf->Cell(30, 7, number_format($sous_total, 2) . ' FCFA', 1);
    $pdf->Ln();
}

// Totaux
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(160, 7, 'Total HT:', 0, 0, 'R');
$pdf->Cell(30, 7, number_format($total_ht, 2) . ' FCFA', 0, 1);

$pdf->Cell(160, 7, 'Remise:', 0, 0, 'R');
$pdf->Cell(30, 7, number_format($total_remise, 2) . ' FCFA', 0, 1);

$pdf->Cell(160, 7, 'Total TTC:', 0, 0, 'R');
$pdf->Cell(30, 7, number_format($total_ht + $total_remise, 2) . ' FCFA', 0, 1);

// Message de remerciement
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 10, "Merci pour votre achat !", 0, 1, 'C');

// Générer le PDF
$pdf->Output('I', 'maFacture.pdf');

// Fermer la connexion
mysqli_close($link);
exit();
?>
