<section>
    <div class="titre">
        <h2>Administration du site (Accès réservé)</h2></br>
        <h5>- Bonjour <?php echo $_SESSION['login_admin']; ?> -</h5>
    </div>

    <a href ="index.php?Controleur=ModifBDD&action=afficherGestionCategorie">Gerer les catégories</a> <br />
    <a href="index.php?Controleur=ModifBDD&action=afficherGestionProduit">Gerer les produits (en chantier)</a>
    <p><br />
        <a href="index.php?Controleur=Admin&action=seDeconnecter">Déconnexion (<?php echo $_SESSION['login_admin'] ?>)</a>
    </p>
</section>