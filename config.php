<?php

session_start();

require_once(__DIR__ . '/vendor/autoload.php');

function debug($objeto)
{
	echo "<br>";
	var_dump($objeto);
	exit;
}

function redirect($url)
{
    header('location: ' . $url);
    exit;
}

error_reporting(E_ERROR | E_WARNING);

date_default_timezone_set(timezone_identifiers_list()[178]);

?>