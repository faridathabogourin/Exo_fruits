<?php
require_once("connexion.php");
session_start();
 ?>

<?php
   $essai=["id1"=>"1",
   "id2"=>"2",
   "id3"=>"3",
   "id4"=>"4",
   "id5"=>"5",
   "id6"=>"6",
   "id7"=>"7",
   "id8"=>"8",
   "id9"=>"9",
   "id10"=>"10",
   "id11"=>"11",
   "id12"=>"12",
   "id13"=>"13",
   "id14"=>"14",
   "id15"=>"15",
   "id16"=>"16",
   "id17"=>"17",
   "id18"=>"18",
   "id19"=>"19",
   "id20"=>"20",
   "id21"=>"21",
   "id22"=>"23",
   "id24"=>"24",]
  


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Défilement</title>
 
</head>

<header>
<?php

?>
</header>
<body>
    <div class="h-head">
        <h2><strong>Les Produits d'Exo'Fruits</strong></h2>
        <h4>Faites exploser vos papilles</h4>
       </div>

    <h4 class="h-t"><strong>Fruits Tropicaux</strong></h4>
<div class="h-scroll-container">
    
    <div class="h-scroll-item">
      <img src="Images/mangue.jpg" alt="Article 1">
      <p class="h-redu">-20%</p>
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id1']; ?>">
                        <h3><strong>Mangues</strong></h3>
                        </a>
           
        </div>
      <p class="h-prix">1.500FCFA/Kg</p>
      <p class="h">1.200FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/ananas.jpg" alt="Article 2">
      <div class="lien">
     
                        <a href="produit.php?id=<?php echo $essai['id2']; ?>">
                        <h3><strong>Ananas</strong></h3>
                        </a>
        
            </div>
      <p class="h">1.500FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/papaye.jpg" alt="Article 3">
      <p class="h-redu">-30%</p>
      <div class="lien">
     
                        <a href="produit.php?id=<?php echo $essai['id3']; ?>">
                        <h3><strong>Papaye</strong></h3>
                        </a>
           
            </div>
      <p class="h-prix">2.800FCFA/Kg</p>
    <p class="h">1.960FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/passion.jpg" alt="Article 4">
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id4']; ?>">
                        <h3><strong>Fruit de la Passion</strong></h3>
                        </a>
          
            </div>
      <p class="h">7.000FCFA/kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/goyave.jpg" alt="Article 5">
      <div class="lien">
     
                        <a href="produit.php?id=<?php echo $essai['id5']; ?>">
                        <h3><strong>Goyaves</strong></h3>
                        </a>
         
        </div>
      <p class="h">2.000FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/banane.jpg" alt="Article 6">
      <div class="lien">
    
                        <a href="produit.php?id=<?php echo $essai['id6']; ?>">
                        <h3><strong>Bananes</strong></h3>
                        </a>
        
            </div>
      <p class="h">950FCFA/Kg</p>
    </div>
    
</div>

<!--Agrumes-->
<h4 class="h-t"><strong>Agrumes</strong></h4>
<div class="h-scroll-container">
<div class="h-scroll-item">
      <img src="Images/orange.jpg" alt="Article 3">
      <p class="h-redu">-10%</p>
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id7']; ?>">
                        <h3><strong>Orange</strong></h3>
                        </a>
           
            </div>
      <p class="h-prix">1.000FCFA/Kg</p>
    <p class="h">900FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/citron.jpg" alt="Article 2">
      <div class="lien">
 
                        <a href="produit.php?id=<?php echo $essai['id8']; ?>">
                        <h3><strong>Citron</strong></h3>
                        </a>
          
            </div>
      <p class="h">700FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/pamp.jpg" alt="Article 3">
      <p class="h-redu">- 45%</p>
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id9']; ?>">
                        <h3><strong>Pamplemousse</strong></h3>
                        </a>
        
            </div>
      <p class="h-prix">4.800FCFA/Kg</p>
    <p class="h">2.640FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/mandarine.jpg" alt="Article 4">
      <div class="lien">
  
                        <a href="produit.php?id=<?php echo $essai['id10']; ?>">
                        <h3><strong>Mandarine</strong></h3>
                        </a>
       
            </div>
      <p class="h">4.000FCFA/kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/lime.jpg" alt="Article 5">
      <div class="lien">
  
                        <a href="produit.php?id=<?php echo $essai['id11']; ?>">
                        <h3><strong>Lime</strong></h3>
                        </a>
        
            </div>
      <p class="h">2.000FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/clementine.jpg" alt="Article 6">
      <div class="lien">
    
                        <a href="produit.php?id=<?php echo $essai['id12']; ?>">
                        <h3><strong>Clémentine</strong></h3>
                        </a>
          
            </div>
      <p class="h">1.950FCFA/Kg</p>
    </div>   
</div>


<!--Fruits secs-->
<h4 class="h-t"><strong>Fruits Secs</strong></h4>
    
<div class="h-scroll-container">
    
    <div class="h-scroll-item">
      <img src="Images/amand.jpg" alt="Article 1">
      <p class="h-redu">-20%</p>
      <div class="lien">
   
                        <a href="produit.php?id=<?php echo $essai['id13']; ?>">
                        <h3><strong>Amandes</strong></h3>
                        </a>
           
            </div>
      <p class="h-prix">1.500FCFA/Kg</p>
      <p class="h">1.200FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/noix.jpg" alt="Article 2">
      <div class="lien">
  
                        <a href="produit.php?id=<?php echo $essai['id14']; ?>">
                        <h3><strong>Noix</strong></h3>
                        </a>
         
            </div>
      <p class="h">4.000FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/nois.jpg" alt="Article 3">
      <p class="h-redu">-50%</p>
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id15']; ?>">
                        <h3><strong>Noisettes</strong></h3>
                        </a>
        
            </div>
      <p class="h-prix">8.000FCFA/Kg</p>
    <p class="h">4.000FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/cajou.jpg" alt="Article 4">
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id16']; ?>">
                        <h3><strong>Cajoux</strong></h3>
                        </a>
      
            </div>
      <p class="h">2.675FCFA/kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/pistache.jpg" alt="Article 5">
      <div class="lien">
 
                        <a href="produit.php?id=<?php echo $essai['id17']; ?>">
                        <h3><strong>Pistache</strong></h3>
                        </a>
        
            </div>
      <p class="h">3.000FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/raisin.jpg" alt="Article 6">
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id18']; ?>">
                        <h3><strong>Raisins Secs</strong></h3>
                        </a>
         
            </div>
      <p class="h">1.700FCFA/Kg</p>
    </div>
</div>
<!--Légumes Frais-->
<h4 class="h-t"><strong>Légumes Frais</strong></h4>
    
<div class="h-scroll-container">
    
    <div class="h-scroll-item">
      <img src="Images/tomates.jpg" alt="Article 1">
      <p class="h-redu">-25%</p>
      <div class="lien">
     
                        <a href="produit.php?id=<?php echo $essai['id19']; ?>">
                        <h3><strong>Tomates</strong></h3>
                        </a>
            
            </div>
      <p class="h-prix">1.500FCFA/Kg</p>
      <p class="h">1.125FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/carotte.jpg" alt="Article 2">
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id20']; ?>">
                        <h3><strong>Carottes</strong></h3>
                        </a>
        
            </div>
      <p class="h">1.700FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/concombre.jpg" alt="Article 3">
      <div class="lien">
     
                        <a href="produit.php?id=<?php echo $essai['id21']; ?>">
                        <h3><strong>Concombres</strong></h3>
                        </a>
         
            </div>
      <p class="h">3.800FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/poivron.jpg" alt="Article 4">
      <div class="lien">
      
                        <a href="produit.php?id=<?php echo $essai['id22']; ?>">
                        <h3><strong>Poivrons</strong></h3>
                        </a>
         
            </div>
      <p class="h">500FCFA/kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/brocoli.jpg" alt="Article 5">
      <p class="h-redu">-30%</p>
      <div class="lien">
   
                        <a href="produit.php?id=<?php echo $essai['id22']; ?>">
                        <h3><strong>Brocoli</strong></h3>
                        </a>
         
            </div>
      <p class="h-prix">24.000FCFA/Kg</p>
      <p class="h">16.800FCFA/Kg</p>
    </div>
    <div class="h-scroll-item">
      <img src="Images/epinards.jpg" alt="Article 6">    <div class="lien">
 
                        <a href="produit.php?id=<?php echo $essai['id24']; ?>">
                        <h3><strong>Epinards</strong></h3>
                        </a>
           
            </div>
      <p class="h">850FCFA/Kg</p>
    </div>
</div>

<script src="nosproduits.js"></script>
</body>
</html>
