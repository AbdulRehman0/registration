<?php

ini_set('display_errors', 1);

ob_start();

define('DB_USER', 'root');

define('DB_PASS', '');

define('DB_HOST', 'localhost');

define('DB_NAME', 'registration2');


/* BaseUrl */


//require_once ROOT_PATH . '/Conf/Conf.php';
require('MysqliDb.php');
session_start();
function connectdb() {
    
    $DB = new MysqliDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    return $DB;

}
