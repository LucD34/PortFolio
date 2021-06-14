<div id="Produit">
    <a href="index.php?Controleur=Affichage&action=afficherProduit&id=<?php echo $unProduit->idProduit;?>"><?php echo $unProduit->libelleProduit;?></a>
    <img src="<?php echo Chemins::IMAGES_PRODUITS."/".$unProduit->libelleCategorie."/".$unProduit->Image;?>" alt="photo" />
    <h5><?php echo $unProduit->prixHTProduit;?> €</h5>
    <form method="post">
        <input type="hidden" name="productId" value="<?= $unProduit->idProduit;?>">
        <input type="number" name="quantite" value="1" min="1">
        <input type="submit" name="addProductToBasket" value="Ajouter au panier">
    </form>
    <br /><br />
</div>