<?php

session_start();

date_default_timezone_set('Europe/Paris');

//echo '<pre>'.print_r($_SESSION['user'], true).'</pre>';
//session_destroy();

require '../vendor/autoload.php';
require_once __DIR__.'/../config/defines.php';
require_once __DIR__.'/../config/db.php';
require '../config/router.php';
