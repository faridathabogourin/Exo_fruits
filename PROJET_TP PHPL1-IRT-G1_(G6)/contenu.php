<?php

   if(isset($_GET["page"]
   ))
   {
    switch($_GET["page"])
    {
        case "pani":include("panier.php");
        break;
        case "sami":include("macommande.php");
        break;
        case "auteur":include("auteur.html");
        break;
        case "hans":include("prods.php");
        break;
        case "pro":include("produit.php");
        break;
        default:include("acceuil.php");
    }
    
   }else{
    include("acceuil.php");
   }
?> 