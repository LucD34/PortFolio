<?php
class ControleurModifBDD
{
    public function afficherGestionCategorie()
    {
        require chemins::VUES_GESTION . 'gestCategorie.php';
    }
    public function afficherModifCategorie()
    {
        require Chemins::VUES_MODIF . 'modifierCategorie.php';
    }
    public function afficherAjoutCategorie()
    {
        require Chemins::VUES_AJOUT . 'categorieAdd.php';
    }
    public function afficherSuppressionCategorie()
    {
        require Chemins::VUES_SUPPR . 'supprimerCategorie.php';
    }
    public  function ajouterCategorie()
    {
        GestionBoutique::InsertCategorie(GestionBoutique::genererClePrimaire("Categorie", "idCategorie"),$_POST['Categorie']);
        VariablesGlobales::$Message = "La catégorie a été ajoutée";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_AJOUT . 'categorieAdd.php';
    }
    public function DeleteCategorie()
    {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        GestionBoutique::DeleteCategorie($_POST['idCategorie']);
        VariablesGlobales::$Message = "La catégorie a été supprimée";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_SUPPR . 'supprimerCategorie.php';
    }
    public function ModifierCategorie()
    {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        GestionBoutique::ModifierCategorie($_POST['idCategorie'],$_POST['ModifCategorie']);
        VariablesGlobales::$Message = "La catégorie a été modifiée";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_MODIF . 'modifierCategorie.php';
    }

    public function afficherGestionProduit()
    {
        require chemins::VUES_GESTION . 'gestProduit.php';
    }
    public function afficherAjoutProduit()
    {
        require chemins::VUES_AJOUT .'';
    }
    public function afficherModifProduit()
    {
        require chemins::VUES_MODIF .'';
    }
    public function afficherSuppressionProduit()
    {
        require Chemins::VUES_SUPPR . 'supprimerProduit.php';
    }
    public  function ajouterProduit()
    {
        GestionBoutique::InsertCategorie(GestionBoutique::genererClePrimaire("Categorie", "idCategorie"),$_POST['Categorie']);
        VariablesGlobales::$Message = "La catégorie a été ajoutée";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_AJOUT . 'categorieAdd.php';
    }
    public function DeleteProduit()
    {
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduits();
        GestionBoutique::DeleteProduit($_POST['idProduit']);
        VariablesGlobales::$Message = "Le produit a été supprimé";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_SUPPR . 'supprimerProduit.php';
    }
    public function ModifierProduit()
    {
        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
        GestionBoutique::ModifierCategorie($_POST['idCategorie'],$_POST['ModifCategorie']);
        VariablesGlobales::$Message = "La catégorie a été modifiée";
        echo VariablesGlobales::$Message;
        require Chemins::VUES_MODIF . 'modifierCategorie.php';
    }


}