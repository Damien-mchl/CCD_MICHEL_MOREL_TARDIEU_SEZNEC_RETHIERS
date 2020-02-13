<?php

namespace GEG\modele;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model{

    protected $table = 'besoin';

    protected $primaryKey = 'id';

    public $timestamps = false;
}