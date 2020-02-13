<?php

namespace GEG\controleur;

use Slim\Slim;
const INTERFACE_CONNEXION = 1;

class VueCompte{

  public $arr;

    public function __construct($a)
    {
        $this->arr = $a;
    }

    public function render($selecteur){
          $app = Slim::getInstance();
          $content = "";
          $co = "Se connecter";
          switch ($selecteur) {
              case INTERFACE_CONNEXION:
              {
                  $content = $this->afficherInterfaceConnexion();
                  break;
              }
          }
    }
}
