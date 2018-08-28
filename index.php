#!/usr/bin/php
<?php

/*

to stop daemon 
kill -9 index.php
OR
kill -9 php

*/

require_once(__DIR__ . '/vendor/autoload.php');
require_once('System/Daemon.php');
require_once('config.php');

System_Daemon::setOptions($options);
System_Daemon::start(); 

ORM::configure($db_link);
ORM::configure('username', $db_user);
ORM::configure('password', $db_pass);

while(!System_Daemon::isDying()) {
    

    $bks = ORM::for_table('bank_account')->where('account_status', 0)->find_many();
    $size = ORM::for_table('bank_account')->where('account_status', 0)->count();
    if ($size > 0) {
        error_log("you have " . $size . " inactive accounts.".PHP_EOL, 3, $infoLogfile);
    } else {
        error_log("There is nothing to report.".PHP_EOL, 3, $infoLogfile);
    }

    System_Daemon::iterate(5);

}
System_Daemon::stop();

?>
