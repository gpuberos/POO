<?php

// Classe étendue
class Admin extends User
{
    // Propriété protégée $ban stocke la liste des utilisateurs bannis.
    protected $ban;
    
    public function setBan($b)
    {
        // Ajoute la valeur de $b à la fin du dernier élément du tableau $ban. 
        // Si $ban est vide, $b devient le premier élément.
        $this->ban[] .= $b;
    }

    public function getBan()
    {
        // Affiche le nom de l'administrateur qui a banni les utilisateurs
        echo 'Utilisateurs bannis par ' . $this->user_name . ' : ';

        // Parcourt chaque utilisateur banni dans le tableau $ban
        foreach ($this->ban as $value) {

            // Affiche le nom de l'utilisateur banni
            echo $value . ', ';
        }
    }
}
