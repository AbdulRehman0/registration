<?php

ini_set('display_errors', 0);

ob_start();

define('ROOT_PATH', '/var/www/vhosts/islamicrelief-web2.dc2.iomarthosting.com/httpdocs');

define('DB_USER', 'bureau_usr');

define('DB_PASS', 'Berty678!!');

define('DB_HOST', 'localhost');

define('DB_NAME', 'donation_bureau');

define('PROTOCOL', 'http');

/* BaseUrl */
define('BASEURL', 'https://islamicreliefbackup.website/');

define('BASEURLDONATION', 'https://islamicreliefbackup.website/donation/');

define('UPLOAD_DIR', '/var/www/vhosts/islamicreliefbackup.website/httpdocs/donation/');

define('DEFAULT_SINGLE_VALUE', 1174);

define('DEFAULT_MONTHLY_VALUE',1178 );

/* Currency */
define('Currency', "&#163;");

//require_once ROOT_PATH . '/Conf/Conf.php';
require('MysqliDb.php');

function connectdb() {
    
    $DB = new MysqliDb('localhost', 'bureau_usr', 'Berty678!!', 'donation_bureau');
    
    return $DB;

}

function createSession() {
    $db = connectdb();
    
    $loop = true;
    
    while ($loop) {
        
        $sessionId = md5(uniqid($_SERVER['REMOTE_ADDR'], true));
        
        $qry = "select session_id from user_sessions where session_id = ?";
        
        $params = array($sessionId);
        
        $result = $db->rawQuery($qry, $params);

        if (count($result) > 0) {
        
            $loop = true;
        
        } else {
        
            $loop = false;
            
            $data = array('session_id' => $sessionId);
            
            $db->insert('user_sessions', $data);
            
            break;
        }
    }
    return $sessionId;
}
