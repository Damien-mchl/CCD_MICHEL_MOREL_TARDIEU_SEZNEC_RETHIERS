<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Slim\Slim;
use \Illuminate\Database\Capsule\Manager as EloquentManager;

$app = new Slim();

$db = new EloquentManager();
$db->addConnection(parse_ini_file("src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();