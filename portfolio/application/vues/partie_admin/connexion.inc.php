<section> 
    
    <div class="titre">
        <h2>Administration du site (Accès réservé)</h2>
    </div>
    <form method="post" action="index.php?Controleur=Admin&action=verifierConnexion">
        <fieldset>
            <legend>Identification</legend>
            <label for="login">Votre login :</label> <input type="text" name="login" id="login" /> <br/><br />
            <label for="passe">Votre mot de passe :</label><input type="password" name="passe" id="passe" />
            <br/>
            <input type="checkbox" name="connexion_auto" id="connexion_auto" />
            <label for="connexion_auto" class="enligne"> Connexion automatique </label><br/> 
            <div class="connexion">
            <input type="submit" value="Connexion" />
            </div>
            <div class="inscription">
                <input type="submit" value="S'inscrire" />
            </div>

        </fieldset>
    </form>
</section>
