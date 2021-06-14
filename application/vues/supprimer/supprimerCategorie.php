<section>

    <div class="titre">
        <h2>Suppression de catégorie</h2>
    </div>


    <form action="index.php?Controleur=ModifBDD&action=DeleteCategorie" method="POST" enctype="multipart/form-data">

        <fieldset>

            <?php
            VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
            ?>
            <label for="libelleCategorie">Libelle Catégorie :</label>
            <select name="idCategorie" id="idCategorie">

                <?php
                foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
                    ?>
                    <option value=<?php echo $uneCategorie->idCategorie; ?>><?php echo $uneCategorie->libelleCategorie; ?></option>
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
    <form action="index.php?Controleur=ModifBDD&action=afficherGestionCategorie" method="POST" enctype="multipart/form-data">
        <div class="retour">
        <input type='submit' name='retour' id='retour' value='retour'/>
        </div>
        </form>
</section>