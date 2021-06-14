<section>

    <div class="titre">
        <h2>Ajout de produit</h2>
    </div>
    <form method="post" action="index.php?Controleur=ModifBDD&action=afficherCategorie">
        <fieldset>
            <label for="LibelleProduit">Nom produit :</label> <input type="text" name="Nom" id="Nom" /> <br /><br />
            <label for="description">Description produit :</label> <input type="text" name="Description" id="Description" /> <br /><br />
            <label for="prixHTProduit">Prix produit :</label> <input type="text" name="Prix" id="Prix" />
        <br /><br />
            <input type="submit" value="Ajouter" />
        </fieldset>
    </form>
</section>