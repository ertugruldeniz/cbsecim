<?php
 
ob_start(); 
session_start();

date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',      'cbsecim');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');

include_once 'database.php';

include_once 'fonksiyon.php';


?>