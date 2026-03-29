<?php
require_once("connexion.php");

if (isset($_GET['q'])) {
    $search = mysqli_real_escape_string($link, $_GET['q']);
    
    // Requête pour récupérer les produits correspondants
    $query = "SELECT id, nom FROM produits WHERE nom LIKE '%$search%' LIMIT 5";
    $result = mysqli_query($link, $query);

    $suggestions = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = [
            'id' => $row['id'],
            'nom' => $row['nom']
        ];
    }

    echo json_encode($suggestions);
}


mysqli_close($link);
?>