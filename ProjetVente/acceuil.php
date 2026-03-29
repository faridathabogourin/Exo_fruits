<div class="far-bar">
    <input type="text" placeholder="Que desirez-vous..."  id="search" onkeyup="searchProducts()">
    <button type="submit">🔍</button><div id="suggestions"></div>
 
</div>

<script>
        function searchProducts() {
            let query = document.getElementById("search").value;

            if (query.length === 0) {
                document.getElementById("suggestions").innerHTML = "";
                document.getElementById("suggestions").style.display = "none";
                return;
            }

            fetch("search.php?q=" + query)
                .then(response => response.json())
                .then(data => {
                    let suggestionsDiv = document.getElementById("suggestions");
                    suggestionsDiv.innerHTML = "";

                    if (data.length > 0) {
                        data.forEach(product => {
                            let div = document.createElement("div");
                            div.textContent = product.nom;
                            div.onclick = function () {
                                window.location.href = "produit.php?id=" + product.id;
                            };
                            suggestionsDiv.appendChild(div);
                        });

                        suggestionsDiv.style.display = "block";
                    } else {
                        suggestionsDiv.style.display = "none";
                    }
                })
                .catch(error => console.error("Erreur lors de la récupération des suggestions :", error));
        }
    </script>

<main class="far-lv"> 
     
    <section class="far-tittle">
        <h1><strong>BIENVENUE CHEZ EXO'FRUITS</strong> </h1>
        <p><em><strong>  Votre boutique en ligne de fruits et légume ,<br>qui vous apporte des variétés 
            et un goût agréable depuis le confort de votre maisons,<br>
          laisser vous emporter dans un  voyage sensoriel avec des fruits exotiques d'exception. </strong> </em></p>
       
    </section>

    <section class="far-catégories">
        <h2>Nos meilleurs sélections</h2>
        
    </section>
    <section class="far-blog-grid">
        <fruits class="far-blog-card">
            <div class="far-blog-image">
                <img src="image/fruits sec.jpg" alt="fruits sec.jpg">
            </div>
            <div class="far-blog-content">
               <strong> <h2>Fruits Secs </h2></strong>
                <p>Les fruits secs sont des fruits dont la majeure partie 
                    de leur eau a été éliminée par séchage, soit naturellement au soleil,
                     soit par des procédés industriels.
                     En plus de leur goût 
                      délicieux, les fruits secs offrent de nombreux bienfaits pour la 
                      santé, notamment en aidant à la digestion, en fournissant une source 
                      d'énergie rapide et en contribuant à la santé cardiaque. Cependant, 
                      il est important de les consommer avec modération en raison de leur
                       teneur élevée en sucre et en calories.</p>
                <a href="index.php?page=hans" class="read-more"><strong> Voir plus </strong></a>
            </div>
        </fruits>
        <fruits class="far-blog-card">
            <div class="far-blog-image">
                <img src="image/multiple fruits exotique.jpeg" alt="multiple fruit exotique.jpg">
            </div>
            <div class="far-blog-content">
                <h2>Multiples Fruit Exotique </h2>
                <p>Les fruits exotiques apportent non seulement une diversité 
                         gustative mais aussi des bienfaits pour la santé, notamment en renforçant
                          le système immunitaire et en améliorant la digestion. Leur popularité ne
                           cesse de croître, faisant d'eux un choix privilégié pour ceux qui cherchent
                            à explorer de nouvelles saveurs et à enrichir leur alimentation.</p>
                            <a href="index.php?page=hans" class="read-more"><strong> Voir plus </strong></a>
                        </div>
        </fruits>
        <fruits class="far-blog-card">
            <div class="far-blog-image">
                <img src="image/legume.jpg" alt="legume.jpg">
            </div>
            <div class="far-blog-content">
                <h2>Légumes Frais </h2>
                <p> Riches en vitamines, minéraux, fibres et
                       antioxydants, les légumes contribuent à maintenir une bonne santé en soutenant
                        la digestion, en renforçant le système immunitaire et en réduisant le risque
                         de maladies chroniques. Ils sont polyvalents en cuisine, pouvant être consommés
                          crus, cuits, grillés, ou incorporés dans une multitude de plats, des salades 
                          aux soupes en passant par les ragoûts. Les légumes sont un pilier de nombreux
                           régimes alimentaires sains à travers le monde.</p>
                           <a href="index.php?page=hans" class="read-more"><strong> Voir plus </strong></a>
                        </div>
        </fruits>
        <fruits class="far-blog-card">
            <div class="far-blog-image">
                <img src="image/agrumes.jpg" alt="Agrumes">
            </div>
            <div class="far-blog-content">
                <h2>Agrumes </h2>
                <p> Originaires des régions subtropicales 
                     et tropicales, les agrumes sont appréciés pour leur jus rafraîchissant,
                      leur pulpe juteuse et leur zeste aromatique. Ils sont largement utilisés
                       en cuisine, en pâtisserie et dans la production de boissons. En plus de
                        leur saveur distinctive, les agrumes sont reconnus pour leurs bienfaits 
                        pour la santé, notamment leur rôle dans le renforcement du système immunitaire
                         et leur teneur en antioxydants.</p>
                         <a href="index.php?page=hans" class="read-more"><strong> Voir plus </strong></a>
                         
            </div>
        </fruits>
          </section>
    
         

    <setcion class="far-loki">
        <h2> Ce que nos clients disent</h2>
        <p><em>"Un goût exceptionnel, une fraicheur incroyable"</em></p>
        <p><em>"Livraison rapide, services au top"</em></p>

    </section>
    <h2> <strong>Nos services de contact</strong></h2>
    <section class="far-con">
    
    
   <a href="https://www.facebook.com/ "><img src="image/facebook.png" width="30px"></a>
    <a href="https://www.instagram.com/ "><img src="image/instagram.png" width="30px"></a>
    <a href="https://x.com/ "><img src="image/twitter.png" width="30px"></a>
    <a href="tel:+2290144014690"><ins> <img src="image/telephone.png" width="30"></ins></a> 
</section>
</main>
</html>