<!-- CORPS de la page-->
<section>
<h2>Boutique</h2>
<a href="index.php?cas=afficherIndexAdmin"> Se connecter </a>
    <?php
    
    
    foreach (VariablesGlobales::$lesProduits as $unProduit) {
    ?>
    
        <article>
          <div id = "boutique">
              
          
            <aside>
                  
<!--                     <br />-->
                <h1><?php echo $unProduit->libelleProduit;?></h1>
               
                
                <img src="<?php echo Chemins::IMAGES_PRODUITS."/".$unProduit->libelleCategorie."/".$unProduit->Image;?>" alt="photo" />
                <h3><?php echo $unProduit->description;?> </h3>
                <h5><?php echo $unProduit->prixHTProduit;?> €</h5>
                <a>
                    <div id ="panier">
                        <img src="public/images/boutique/ajouter_panier.png" title="Ajouter au panier" width = "50" height = "50"/><br /><br /></div> </a>
               
            </aside>
            </div>

        </article>

    <?php
      }
    ?>
</section>