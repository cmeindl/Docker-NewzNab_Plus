<?php

//=========================
// Config you must change - updated by installer.
//=========================
define('DB_TYPE', 'mysql');
define('DB_HOST', '192.168.0.10');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PASSWORD','xxxxxxx');
define('DB_NAME', 'newznab');
define('DB_INNODB', false);
define('DB_PCONNECT', true);
define('DB_ERRORMODE', PDO::ERRMODE_SILENT);

define('NNTP_USERNAME', 'xxxxxxx');
define('NNTP_PASSWORD', 'xxxxxxx');
define('NNTP_SERVER', 'reader.usenetbucket.com');
define('NNTP_PORT', '443');
define('NNTP_SSLENABLED', true);

define('CACHEOPT_METHOD', 'none');
define('CACHEOPT_TTLFAST', '120');
define('CACHEOPT_TTLMEDIUM', '600');
define('CACHEOPT_TTLSLOW', '1800');
define('CACHEOPT_MEMCACHE_SERVER', '127.0.0.1');
define('CACHEOPT_MEMCACHE_PORT', '11211');

// define('EXTERNAL_PROXY_IP', ''); //Internal address of public facing server
// define('EXTERNAL_HOST_NAME', ''); //The external hostname that should be used

require("automated.config.php");
