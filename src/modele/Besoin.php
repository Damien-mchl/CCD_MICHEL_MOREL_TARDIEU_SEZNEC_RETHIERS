<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model{

    protected $table = 'besoin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function role_id()
    {
        return $this->belongsTo('\modele\Role', 'idRole');
    }

    public function user_id()
    {
        return $this->belongsTo('\modele\User', 'idUser');
    }

    public function creneau_id()
    {
        return $this->belongsTo('\modele\Creneau', 'idCreneau');
    }
}