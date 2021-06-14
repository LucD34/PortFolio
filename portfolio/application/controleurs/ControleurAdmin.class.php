<?php


class ControleurAdmin
{
    public function AfficherIndexAdmin()
{
    if (isset($_SESSION['login_admin']))
        require Chemins::VUES_ADMIN . 'index_admin.inc.php';
    else
        require Chemins::VUES_ADMIN . 'connexion.inc.php';
}
    public function seDeconnecter()
{
// Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    header("Location:index.php");
    setcookie('login_admin', '');
}
    public function verifierConnexion()
{
    if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe'])) {
        $_SESSION['login_admin'] = $_POST['login'];

        if (isset($_POST['connexion_auto']))
            setcookie('login_admin', $_POST['login'], time() + 7 * 24 * 3600, null, null, false, true);
// Le cookie sera valable dans ce cas 1 semaine (7 jours)

        require Chemins::VUES_ADMIN . 'index_admin.inc.php';
    } else
        require Chemins::VUES_ADMIN . 'acces_interdit.inc.php';
}
}