<?php

namespace GEG\controleur;

use \GEG\vue\VuePermanance;
use \GEG\modele\Crenau;

class ControleurPermanance{
    public function sinscrirCreneau($idCreneau, $role, $ponctuelle){
        $cr= Crenau::were('id', '=', $idCreneau)->first();

    }
}