<?php

use \Slim\Slim;
use \GEG\modele\Creneau

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
}


