<section>

    <div class="titre">
        <h2>Ajouter la catégorie</h2>
    </div>
    <fieldset>
        <form method="post" action="index.php?Controleur=ModifBDD&action=ajouterCategorie">
            <label for="libelleCategorie">Catégorie produit :</label> <input type="text" name="Categorie" id="Categorie" value=""/>
            <br /><br />
            <div class="ajouter">
            <input type="submit" value="Ajouter" />
            </div>
        </form>
    </fieldset>

    <form action="index.php?Controleur=ModifBDD&action=afficherGestionCategorie" method="POST" enctype="multipart/form-data">
        <div class="retour">
        <input type='submit' name='retour' id='retour' value='retour'/>
        </div>
    </form>
</section>


