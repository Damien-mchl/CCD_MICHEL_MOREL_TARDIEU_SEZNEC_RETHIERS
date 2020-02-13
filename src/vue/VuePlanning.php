<?php

namespace GEG\vue;
const AFFICHER_PLANNING = 1;

class VuePlanning
{
    public $app;

    public function __construct()
    {
      $this->app = Slim::getInstance();
    }

    public function afficherPlanning(){

    }

    public function render($selecteur){
      $content = "";
      switch ($selecteur) {
            case AFFICHER_PLANNING :
                $content = $this->afficherPlanning();
                break;
        }
        $urlRacine = $app->urlFor('racine');
        $urlCSS = $app->request->getRootURI() . '/www/css';
        $urlJS = $app->request->getRootURI() . '/www/js';
        $urlVendor = $app->request->getRootURI() . '/www/vendor';
        $html = <<<END


END;
      echo $html;
    }
}
