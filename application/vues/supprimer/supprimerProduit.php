<section>

    <div class="titre">
        <h2>Suppression de produit</h2>
    </div>


    <form action="index.php?Controleur=ModifBDD&action=DeleteProduit" method="POST" enctype="multipart/form-data">

        <fieldset>

            <?php
            VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits();
            ?>
            <label for="libelleProduit">Libelle Produit :</label>
            <select name="idProduit" id="idProduit">

                <?php
                foreach (VariablesGlobales::$lesProduits as $unProduit) {
                    ?>
                    <option value=<?php echo $unProduit->idProduit; ?>><?php echo $unProduit->libelleProduit; ?></option>
                    <?php
                }
                ?>

            </select>
            <p><br /></p>
            <div class="supprimer">
            <input type='submit' name='supprimer' id='supprimer' value='supprimer'/>
            </div>
        </fieldset>
    </form>
    <div class="retour">
    <form action="index.php?Controleur=ModifBDD&action=afficherGestionProduit" method="POST" enctype="multipart/form-data">

        <input type='submit' name='retour' id='retour' value='retour'/>
    </form>
    </div>
</section>