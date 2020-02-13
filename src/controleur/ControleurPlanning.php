<?php

namespace GEG\controleur;

use Slim\Slim;
use \GEG\modele\Creneau;
use \GEG\modele\Besoin;
use const GEG\vue\AFFICHER_PLANNING;

class ControleurPlanning{

    private $app;

    public function __construct(){
        $this->app = Slim::getInstance();
    }

    public function creerCreneau(){
        $c = new Creneau();
        $jour = filter_var($_POST['jour'],FILTER_SANITIZE_NUMBER_INT);
        $semaine = filter_var($_POST['semaine'],FILTER_SANITIZE_NUMBER_INT);
        $heureDeb = filter_var($_POST['heureD'],FILTER_SANITIZE_NUMBER_INT);
        $heureFin = filter_var($_POST['heureF'],FILTER_SANITIZE_NUMBER_INT);
        $r = Creneau::where('jour', '=', $jour)
            ->where('semaine', '=', $semaine)
            ->where(function ($query) use($heureDeb,$heureFin){
                $query->where('heureDeb', '<', $heureDeb)
                    ->where('heureFin', '>', $heureDeb);
            })->orWhere(function ($query) use($heureDeb,$heureFin){
                $query->where('heureDeb', '<', $heureFin)
                    ->where('heureFin', '>', $heureFin);
            })
            ->count();
        if($r == 0){
            $c->jour = $jour;
            $c->semaine = $semaine;
            $c->heureDeb = $heureDeb;
            $c->heureFin = $heureFin;
        }
        $c->save();
        $this->app->redirect($this->app->urlFor('afficherPlanning'));
    }

    public function creerBesoin(){
        $b = new Besoin();

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
