<?php

class ControleurProduits {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php';    
    }

    public function afficher($libelleCategorie) {
        VariablesGlobales::$libelleCategorie = $libelleCategorie;//On peut s'en passer grace à la jointure mais facilite la lecture du code dans la vue v_produits
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorie($libelleCategorie);
        require Chemins::VUES . 'v_produits.inc.php';        
    }

}

