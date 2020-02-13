<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    protected $table = 'role';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function role_id()
    {
        return $this->hasMany('\modele\Besoin', 'idRole');
    }
}