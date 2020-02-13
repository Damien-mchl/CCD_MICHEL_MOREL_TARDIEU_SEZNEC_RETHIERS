<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function besoins(){
        return $this->hasMany('GEG\modele\Besoin', 'id');
    }
}
