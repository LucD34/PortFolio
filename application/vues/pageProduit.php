<!-- CORPS de la page-->
<section>
    <?php $unProduit = VariablesGlobales::$leProduit; ?>
<h2><?php  echo $unProduit->libelleProduit;?></h2>
        <article>
          <div id = "ProduitUnique">
                <img src="<?php echo Chemins::IMAGES_PRODUITS."/".$unProduit->libelleCategorie."/".$unProduit->Image;?>" alt="photo" />
                <h3><?php echo $unProduit->description;?> </h3>
                <h5><?php echo $unProduit->prixHTProduit;?> €</h5>
              <p>id du produit: <?php echo $unProduit->idProduit;?></p>
              <form method="post" action="index.php?cas=ajouterPanier">
                  <input type="hidden" name="productId" value="<?= $unProduit->idProduit;?>">
                  <input type="number" min="1" placeholder="Quantité" name="quantite">
                  <input type="submit" name="addProductToBasket" value="Ajouter au panier">
              </form>
          </div>
        </article>
</section>