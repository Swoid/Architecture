<?php
date_default_timezone_set('Europe/Brussels');
# Les constantes
define('ROUTES', './App/Configs/routes.php');
define('DS', DIRECTORY_SEPARATOR);
define('BASE'   , __DIR__);
define('ROOT'   , str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('CORE'   , ROOT.'Core'.DS);
define('APP'    , ROOT.'App'.DS);
define('ASSETS', APP."Assets".DS);

# Require autoloader
require('./vendor/autoload.php');

# Instancier le dispatcher
$dispatcher = new \Core\Dispatcher();
