<?php

use Slim\Slim;
use \GEG\modele\Creneau;
use const GEG\vue\AFFICHER_PLANNING;
namespace GEG\controleur;
class ControleurPlanning{

    private $app;

    public function __construct(){
        $this->app = Slim::getInstance();
    }

    public function creerCreneau(){
        $c = new Creneau();
        $c->jour = filter_var($_POST['jour'],FILTER_SANITIZE_NUMBER_INT);
        $c->semaine = filter_var($_POST['semaine'],FILTER_SANITIZE_NUMBER_INT);
        $c->semaine = filter_var($_POST['semaine'],FILTER_SANITIZE_NUMBER_INT);
        }

    public function afficherPlanning(){
      if (isset($_SESSION['id_connect']) and $_SESSION['id_connect'] != null) {
            $vue = new VuePlanning();
            $vue->render(AFFICHER_PLANNING);
        } else {
            Slim::getInstance()->redirect(Slim::getInstance()->request->getRootUri());
        }
    }
}
