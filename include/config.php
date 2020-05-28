<?php
require("DbConnect.php");
  error_reporting(1);

    if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
       //Your Local Host Database Credential
        define('DB_SERVER', 'localhost');
        define('DB_SERVER_USERNAME', 'root');
        define('DB_SERVER_PASSWORD', '');
        define('DB_DATABASE', 'eleavesystem');

        define('USE_PCONNECT', 'false');
        define('STORE_SESSIONS', 'mysql');
    }else
    {
        //Your Live Host Database Credential
        define('DB_SERVER', 'localhost');
        define('DB_SERVER_USERNAME', 'root');
        define('DB_SERVER_PASSWORD', '');
        define('DB_DATABASE', 'eleavesystem');
        define('USE_PCONNECT', 'false');
        define('STORE_SESSIONS', 'mysql');

    }
$dbc = new DbConnect();
mysqli_query($dbc->link,'SET CHARACTER SET utf8');


?>