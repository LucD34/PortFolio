<?php
class ControleurCategories {
    public function _construct() {
        
        
    }
    
//    public function afficher() {
//        VariablesGlobales::$lesCategories = GestionBoutique::getLesCategories();
//        require chemins::VUES_PERMANENTES . 'v_menu_categories.inc.php';
//    }
    
   public function afficher($libelleCategorie) {
        VariablesGlobales::$libelleCategorie = $libelleCategorie;
        VariablesGlobales::$lesProduits = $lesProduits = GestionBoutique::getLesProduitsByCategorie($libelleCategorie);
        require chemins::VUES . 'v_produits.inc.php';
    }
}
?>