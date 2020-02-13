<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Model;

class Creneau extends Model{

    protected $table = 'creneau';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function besoins()
    {
        return $this->hasMany('GEG\modele\Besoin', 'id');
    }
}
