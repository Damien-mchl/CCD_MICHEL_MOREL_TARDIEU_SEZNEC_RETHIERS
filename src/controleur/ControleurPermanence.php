<?php

namespace GEG\controleur;

use \GEG\vue\VuePermanance;
use \GEG\modele\Besoin;
use \GEG\modele\Creneau;

class ControleurPermanance{
	public function sinscrirCreneau($idCreneau, $role, $rec, $app){
		$bes= new Besoin;
		if($role>=1 && $role<=6){
			$bes->idRole= $role;

			$cr= Creneau::get();
			if(isset($cr[$idCreneau])){
				$bes->idCreneau= $idCreneau;

				if ($rec== 0 && $rec== 1) {
					$bes->recurent = $rec;

					if(isset($_SESSION['id_connect'])) {
						$bes->idUser = $_SESSION['id_connect'];
						$bes->save();
					}else{
						$app->notFound();
					}
				}else{
					$app->notFound();
				}
			}else{
				$app->notFound();
			}
		}
		else{
			$app->notFound();
		}
	}
}