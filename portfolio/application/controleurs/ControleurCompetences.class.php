<?php


class ControleurCompetences
{
    public function afficherCV() {
        require Chemins::VUES . 'CV.php'; // affichage de la page a propos de moi
    }
    public function afficherMotiv(){
        require Chemins::VUES . 'motivation.php'; // affichage de la page a propos de moi

    }
}