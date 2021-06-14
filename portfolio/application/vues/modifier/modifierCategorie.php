<section>

    <div class="titre">
        <h2>Modification de catégorie</h2>
    </div>


    <form action="index.php?Controleur=ModifBDD&action=ModifierCategorie" method="POST" enctype="multipart/form-data">
        <h3>selectionner la catégorie a modifier</h3>
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
        <br/>
        </fieldset>
        <h3>nouveau libelle</h3>
        <fieldset>
            <label for="libelleCategorie">Libelle Catégorie :</label> <input type="text" name="ModifCategorie" id="ModifCategorie" value=""/> <br /><br />
            <div class="modifier">

            <input type='submit' name='modifier' id='modifier' value='modifier'/>
            </div>
        </fieldset>
    </form>
    <form action="index.php?Controleur=ModifBDD&action=afficherGestionCategorie" method="POST" enctype="multipart/form-data">
        <div class="retour">
        <input type='submit' name='retour' id='retour' value='retour'/>
        </div>
    </form>
</section>