<?php
# Inclure les constantes
include('./Core/Configs/constantes.php');

# Require autoloader
require('./vendor/autoload.php');

# Instancier le dispatcher
$dispatcher = new \Core\Dispatcher();