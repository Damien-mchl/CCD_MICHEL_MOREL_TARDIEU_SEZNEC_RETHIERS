<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class User extends Model{

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function user_id()
    {
        return $this->hasMany('\modele\Besoin', 'idUser');
    }
}