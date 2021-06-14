
<?php
//indentation auto du code sous Netbeans : ALT+MAJ+F
//indentation auto du code sous phpstorm : shift+tab

session_start();

require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::CONFIGS . 'variables_globales.class.php';
require_once Chemins::MODELES . 'panier.class.php';
//Rmq : si les modèles étaient "découpés", ils seraient inclus dans chaque controleur associé et non dans le controleur principal

// Affichage de l'entête de la page

require_once chemins::VUES_PERMANENTES."entete.inc.php";
//ControleurCategories::afficher();//en version classe statique

if (!isset($_REQUEST['Controleur']))
{
    require_once (Chemins::VUES . "presentation.php");
    Panier::initialiser();
}
else {

    $classeControleur = 'Controleur' . $_REQUEST['Controleur']; //ex : ControleurProduits
    $fichierControleur = $classeControleur . ".class.php"; //ex : ControleurProduits.class.php
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $objetControleur = new $classeControleur(); //ex : $objetControleur = new ControleurProduits();
    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
        $objetControleur->$action();
//ex : $objetControleur->afficher();
    }
    //version avec classe statique
    // $classeStatiqueControleur = 'Controleur' . $_REQUEST['controleur'];
    // $classeStatiqueControleur::$action();
}



//require_once(Chemins::VUES_PERMANENTES . "v_resumePanier.php");

//Affichage du pied de page

require Chemins::VUES_PERMANENTES . 'pied.inc.php';