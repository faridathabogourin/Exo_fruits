<?php
define("HOST","localhost");
define ("USER","root");
define ("MDP","");
define ("BDD","exo");

// Établir la connexion à la base de données
$link = mysqli_connect(HOST, USER, MDP, BDD) or die("Erreur de connexion");
?>
