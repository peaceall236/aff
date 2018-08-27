<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once('System/daemon.php');
require_once('app/config.php');

System_Daemon::setOptions($options);
System_Daemon::start(); 

ORM::configure($db_link);
ORM::configure('username', $db_user);
ORM::configure('password', $db_pass);

while(!System_Daemon::isDying()) {
    

    $bks = ORM::for_table('bank_account')->where('status', 0)->find_many();
    if ($bks->count() > 0) {
        
        error_log("you have " . $bks->count() . "inactive accounts.", 3, $infoLogfile);
    } else {
        error_log("There is nothing to report.", 3, $infoLogfile);
    }

}
System_Daemon::stop();

?>