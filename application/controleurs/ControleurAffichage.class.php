<?php


class ControleurAffichage
{

    public function __construct()
    {
        $this->checkData();
    }

    public function afficherCompetences()
    {
        require Chemins::VUES . 'competences.php'; // affichage de la page a propos de moi
    }

    public function afficherAccueil()
    {
        require Chemins::VUES . 'presentation.php';
    }

    public function afficherProjets()
    {
        require Chemins::VUES . 'projets.php';
    }

    public function afficherBoutique()
    {
        //require Chemins::VUES . 'boutique.php';
        if (file_exists(Chemins::VUES . 'boutique.php')) {
            VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsEtCategories();

            require Chemins::VUES . 'boutique.php';
        } else {
            header('Location: index.php?Controleur=Affichage&action=afficherErreur');
        }

    }

    public function afficherBoutiqueByCategorie()
    {
        if (file_exists(Chemins::VUES . 'categorie.php')) {
            VariablesGlobales::$laCategorie = GestionBoutique::getCategorieById($_REQUEST['id']);

            require Chemins::VUES . 'categorie.php';
        } else {
            header('Location: index.php?Controleur=Affichage&action=afficherErreur');
        }
    }

    public function afficherProduit()
    {
        if (file_exists(Chemins::VUES . 'pageProduit.php')) {
            VariablesGlobales::$leProduit = GestionBoutique::getProduitById($_REQUEST['id']);

            require Chemins::VUES . 'pageProduit.php';
        } else {
            header('Location: index.php?Controleur=Affichage&action=afficherErreur');
        }
    }

    public function afficherErreur()
    {
        require Chemins::VUES . 'erreur404.inc.php';
    }

    public function checkData(){
        if(isset($_POST['addProductToBasket'])){
            // Ajout au panier
            panier::ajouterProduit($_POST['productId'], $_POST['quantite']);
            //var_dump($_POST);
        }
    }
}