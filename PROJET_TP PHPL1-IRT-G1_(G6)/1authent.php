


<?php
session_start(); // Garder la session active pour conserver les données existantes

// Vérifier si le formulaire a été soumis
if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {

    // Connexion à la base de données
    require_once('connexion.php');
        $req = sprintf(" select * from exoauthent where login='%s' and password='%d'",
        mysqli_real_escape_string($link,$_REQUEST['login']),
        md5(mysqli_real_escape_string($link,$_REQUEST['password'])));
        $result= mysqli_query($link,$req);

    // Vérification de l'existence de l'utilisateur
    if(mysqli_num_rows($result) == 1) {
        $info = mysqli_fetch_assoc($result);

        // Stocker les informations de connexion dans la session
        $_SESSION['login'] = $info['login'];
        $_SESSION['email'] = $info['email'];

        // Redirection vers la page de commande
        header('Location: macommande.php');
        exit();
    } else {
        // Redirection en cas d'échec de connexion
        header('Location: 1verif.php');
        exit();
    }
}
?>


