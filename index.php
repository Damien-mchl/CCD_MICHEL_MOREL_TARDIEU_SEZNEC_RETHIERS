<?php
session_start();

require_once('vendor/autoload.php');

use GEG\controleur\ControleurCompte;
use \Slim\Slim;
use \Illuminate\Database\Capsule\Manager as EloquentManager;

$app = new Slim();

$db = new EloquentManager();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();
$app->get("/liste_creneau", function() {
    $controllerPlaning= new ControllerPlanning();
    $controllerPlaning->getListeCreneau();
});

$app->get("/liste_creneau/:idCreneau", function(){
    $creneauController= new CreneauController();
    $creneauController->getCreneau();
});

$app->get("/liste_creneau/:idCreneau/ajoutBesoin", function() use($app){
    $creneauController= new CreneauController();
    $creneauController->getAttributionBesoinForm();
});

$app->post("/liste_creneau/:idCreneau/ajoutBesoin", function() use($app){
    $creneauController= new CreneauController();
    $creneauController->renderNewCrenau();
});

$app->get('/',function () {
    $c = new ControleurCompte();
    $c->afficherInterfaceConnexion();
})->name('racine');

$app->run();
