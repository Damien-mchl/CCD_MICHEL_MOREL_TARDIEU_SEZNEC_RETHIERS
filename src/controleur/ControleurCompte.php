<?php

namespace GEG\controleur;
use const GEG\vue\INTERFACE_CONNEXION;
use GEG\modele\User;
use GEG\vue\VueCompte;
use Slim\Slim;

class ControleurCompte{

  private $app;

  public function __construct(){
    $this->app = Slim::getInstance();
  }

  public function afficherInterfaceConnexion(){
        if (!(isset($_SESSION['id_connect']) and $_SESSION['id_connect']!=null)) {
            $vue= new VueCompte(null);
            $vue->render(INTERFACE_CONNEXION);
        } else {
            $this->app->redirect(Slim::getInstance()->request->getRootUri());
        }
    }

    public function seConnecter(){
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $id=filter_var($_POST['login'],FILTER_SANITIZE_EMAIL);
            $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $login=User::select("login")->where('login','=',"$id")->count();
            if($login==1 and password_verify($password,User::select('password')->where('login','=',"$id")->get()->toArray()[0]["password"])){
                $_SESSION['id_connect']=User::select("login")->where('login','=',"$id")->first()->login;
                setcookie('nomUser',base64_encode($id),time()+60*60*24*30*12,'/');
                $this->app->redirect($this->app->urlFor('afficherPlanning'));
            } else {
                $this->app->redirect($this->app->urlFor('racine'));
            }
        }
    }
}
