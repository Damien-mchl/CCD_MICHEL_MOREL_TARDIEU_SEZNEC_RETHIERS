<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Model;

class Besoin extends Model{

    protected $table = 'besoin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo('GEG\modele\Role', 'id');
    }

    public function user()
    {
        return $this->belongsTo('GEG\modele\User', 'id');
    }

    public function creneau()
    {
        return $this->belongsTo('GEG\modele\Creneau', 'id');
    }
}
