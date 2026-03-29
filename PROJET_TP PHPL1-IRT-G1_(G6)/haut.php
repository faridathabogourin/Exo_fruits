

<header class="far" >
    <div class="far-menu">
        <span class="far-menuiconn" id="far-menuicon">&#9776;</span>
        
        <nav class="far-navlinkss" id="far-navlinks">
           
        <a href="index.php">Accueil</a>
        
            
        <a href='index.php?page=hans'>Nos Produits</a>
    

    
        </nav>


    </div>
        <div class="far-logo">
            <img src="image/logo.jpg" alt="votre logo" >
        </div>
        <div class="far-panier">
            <a href="index.php?page=pani">
            <img class="far-panierr" src="image/panier.png" alt="image de panier" width="50px">
            
            </a>
        </div>

        

    
    
</header>

<script>
    document.addEventListener('DOMContentLoaded',()=>{
        const menuIcon=document.getElementById('far-menuicon');
        const navLinks=document.getElementById('far-navlinks');
    menuIcon.addEventListener('click',()=>{
        navLinks.classList.toggle('active');
    }
);
    }
);
    
   
 </script>