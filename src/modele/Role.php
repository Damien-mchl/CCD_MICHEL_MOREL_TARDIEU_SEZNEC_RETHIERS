<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    protected $table = 'role';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function besoins()
    {
        return $this->hasMany('GEG\modele\Besoin', 'id');
    }
}
