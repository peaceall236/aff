#!/usr/bin/php
<?php

require_once("System/Daemon.php");
require_once("config.php");

System_Daemon::setOptions($options);
System_Daemon::writeAutoRun();


?>