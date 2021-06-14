<?php

//require_once '../../configs/mysql_config.class.php';

class GestionBoutique {

    /**
     *
     * @var PDO
     */
    private static $pdoCnxBase = null;

    /**
     *
     * @var PDOStatement
     */
    private static $pdoStResults = null;
    private static $requete = "";
    private static $resultat = null;

    Public static function SeConnecter() {

        if (!isset(self::$pdoCnxBase)) {
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . MysqlConfig::SERVEUR . ';dbname=' . MysqlConfig::BASE, MysqlConfig::UTILISATEUR, MysqlConfig::MOT_DE_PASSE);

                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8");
            } catch (Exception $e) {

                echo 'Erreur : ' . $e->getMessage() . '<br />';
                echo 'Code : ' . $e->getCode();
            }
        }
    }

    Public static function SeDeconnecter() {
        self::$pdoCnxBase = null;
    }

    public static function addProduit($idProduit,$libelleProduit,$description,$prixHTProduit){
        self::SeConnecter();

        self::$requete = "INSERT INTO `produit` (`idProduit`, `libelleProduit`, `description`, `prixHTProduit`) VALUES ($idProduit, $libelleProduit, $description, $prixHTProduit);";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->bindValue('idProduit', $idProduit);
        self::$pdoStResults->bindValue('libelleProduit', $libelleProduit);
        self::$pdoStResults->bindValue('description', $description);
        self::$pdoStResults->bindValue('prixHTProduit', $prixHTProduit);

        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsEtCategories() {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idCat = C.idCategorie";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    Public static function getLesProduitsByCategorie($idCategorie) {
        self::SeConnecter();
        
        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idCat = C.idCategorie and P.idCat = :idCategorie";

        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idCategorie', $idCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getProduitById($idProduit) {
        self::SeConnecter();
        self::$requete = "SELECT produit.*, categorie.libelleCategorie FROM Produit, categorie WHERE idProduit = :idProd and categorie.idCategorie = Produit.idCat";

        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProd', $idProduit);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->CloseCursor();
        return self::$resultat;
    }

    public static function getCategorieById($idCategorie) {
        self::SeConnecter();
        //self::$requete = "SELECT * FROM Categorie WHERE idCategorie = :idCat";
        self::$requete = "SELECT categorie.* FROM Produit, categorie WHERE idCategorie = :idCat and categorie.idCategorie = Produit.idCat";

        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idCat', $idCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->CloseCursor();
        return self::$resultat;
    }

    public static function isAdminOK($login, $passe) {
        self::seConnecter();
        self::$requete = "SELECT * FROM Utilisateur where login='$login' and passe='".sha1($passe)."' and isAdmin = 1";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
//        self::$pdoStResults->bindValue('login', $login);
//        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return (self::$resultat != null) ;
           
    }
    public static function getMaxTupleByChamp($table, $nomChamp)
    {
        self::seConnecter();
        self::$requete = "SELECT MAX($nomChamp) AS nb FROM " . $table;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::seDeconnecter();
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat->nb;
    }

    public static function genererClePrimaire($table, $nomChamp)
    {
        $idMax = self::getMaxTupleByChamp($table, $nomChamp);
        if ($idMax != null) {
            return $idMax + 1;
        } else {
            return 1;
        }
    }

    public static function getLesCategories() {
        return self::getLesTupleByProcedure("getCategorie");
    }

    public static function getLesTupleByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    public static function DeleteCategorie($id) {
        return self::AjouterSuprModifByProcedure("DeleteCategorie(" .$id . ")");
    }

    public static function ModifierCategorie($id,$libelle) {
        return self::AjouterSuprModifByProcedure("ModifierCategorie(" .$id . ",'".$libelle."'". ")");
    }

    public static function InsertCategorie($id,$libelle) {
        return self::AjouterSuprModifByProcedure("AddCategorie(" .$id . ",'" . $libelle . "'" . ")");
    }

    public static function getLesProduits() {
        return self::getLesTupleByProcedure("getProduit");
    }

    public static function DeleteProduit($id) {
        return self::AjouterSuprModifByProcedure("DeleteProduit(" .$id . ")");
    }

    public static function AjouterSuprModifByProcedure($procedure)
    {
        self::seConnecter();
        self::$requete = "CALL $procedure ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
    }
}
?>