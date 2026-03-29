<?php
require_once("connexion.php");
$q = isset($_GET['q']) ? mysqli_real_escape_string($link, $_GET['q']) : '';

if (!empty($q)) {
    $query = "SELECT nom FROM produits WHERE nom LIKE '%$q%' LIMIT 5";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div onclick='selectSuggestion(\"".$row['nom']."\")'>".$row['nom']."</div>";
    }
}else{
    echo "<div onclick='selectSuggestion(\"Auncun résultat trouvé</div>";
}
mysqli_close($link);
?>