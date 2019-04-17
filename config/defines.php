<?php

$protocol = explode('/', $_SERVER['SERVER_PROTOCOL']);
$protocol = strtoupper($protocol[0]);
$protocol = $protocol ? 'http' : 'https';
$dossier = explode('/', $_SERVER['SCRIPT_NAME']);
$strle_dossier = strlen($dossier[1]);
$delimite = $dossier[1].'/';
$string = $_SERVER['SCRIPT_NAME'];
$path_location = substr($string, 0, strpos($string, $delimite) + $strle_dossier);

// Defines.
define('PATH_ROOT', dirname(__DIR__));
define('PATH_LOCATION', $protocol.'://'.$_SERVER['HTTP_HOST'].$path_location);
define('PATH_INSTALLATION', PATH_ROOT.'/installation');
define('PATH_BASE_TWIG', $protocol.'://'.$_SERVER['HTTP_HOST']);
