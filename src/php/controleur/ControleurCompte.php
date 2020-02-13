<?php

namespace GEG\controleur;
use const GEG\vue\INTERFACE_CONNEXION;

class ControleurCompte{

  public function afficherInterfaceConnexion(){
        if (!(isset($_SESSION['id_connect']) and $_SESSION['id_connect']!=null)) {
            $vue= new VueCompte(CONNEXION);
            $vue->render(INTERFACE_CONNEXION);
        } else {
            Slim::getInstance()->redirect(Slim::getInstance()->request->getRootUri());
        }
    }
}
