<?php

    ob_start();
    session_start();

    defined('DS') ? NULL :define('DS',DIRECTORY_SEPARATOR);
    defined('TEMPLATE_FRONT') ? NULL :define('TEMPLATE_FRONT',__DIR__.DS."front");
    defined('TEMPLATE_BACK') ? NULL :define('TEMPLATE_BACK',__DIR__.DS."back");
    defined('ROOT_PATH') ? NULL :define('ROOT_PATH',$_SERVER["DOCUMENT_ROOT"].'opticals'.DS.'public'.DS);

    

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','opticals');

    $db= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if(!$db){
        die('connection error'. $db->connect_errno);
    }
//default time setting for india
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

    require_once('arrayList.php');
    require_once('function.php');

   

?>