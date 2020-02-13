<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Creneau extends Model{

    protected $table = 'creneau';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function creneau_id()
    {
        return $this->hasMany('\modele\Besoin', 'idCreaneau');
    }
}