<?php
mb_internal_encoding("UTF-8");
date_default_timezone_set("Europe/Istanbul");
setlocale(LC_TIME, "turkish");
setlocale(LC_ALL,'turkish');


// WEBSITE DATABASE INFO
$host = "localhost";
$username = "root";
$password = "";		
$dbname = "sorumvar";
// DATABASE INFO

define('__ROOT__', dirname(dirname(__FILE__)));

// Autoload classes
spl_autoload_register(
    function ($class)
    {
        $path = __ROOT__."/sistem/classlar/".$class.".class.php";
        if(file_exists($path) AND filesize($path) > 0)
        {
            require_once($path);
        } else {
            trigger_error("Class Bulunamadı : ".$path, E_USER_ERROR);
        }
    }
);
// Autoload classes

// Connect to the database
try {
    Database::connect($host, $username, $password, $dbname);
} catch(PDOException $e)
{
    Core::redirect("offline.php");
    die();
}
// Connect to the database
?>