<?php

$db_link = "mysql:host=localhost;dbname=test";
$db_user = "root";
$db_pass = "";
$db_log = true;


# Application settings
$appname = "peacedaemon";
$author = "Alliance Peace";
$email = "roiry25@gmail.com";
$description = "try app";
$dir = __DIR__;
$executable = "index.php";

#Log files
$infoLogfile = __DIR__ . "/logs/info.log";
$errorLogfile = __DIR__ . "/logs/error.log";

## DO NOT EDIT BELOW THIS LINE ##

$options = [
    "authorName" => $author,
    "authorEmail" => $email,
    "appName" => $appname,
    "appDescription" => $description,
    "appDir" => $dir,
    "appExecutable" => $executable,
    "logPhpErrors" => "TRUE", 
    "logFilePosition" => "TRUE",
    "logLinePosition" => "TRUE",
    "sysMaxExecutionTime" => "0",
    "sysMaxInputTime" => "0",
    "sysMemoryLimit" => "512M"
];
?>