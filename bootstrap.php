<?php

require __DIR__."/vendor/autoload.php";

date_default_timezone_set("America/Sao_Paulo");

define('MENTORPATH', __DIR__);
define('CONFIGSOURCEPATH', MENTORPATH.'/src/MentorConfig');
define('CONFIGPATH', MENTORPATH.'/config');
define('MODULESPATH', MENTORPATH.'/modules');
define('VENDORPATH', MENTORPATH.'/vendor');

$mentorConfig = include CONFIGPATH."/config.php";
$mentor = new MentorConfig\Application($mentorConfig);
// $mentor->setAppConfig($appConfig);

// Configurations

$mentor['debug'] = true;
error_reporting(E_ALL);
ini_set('display_erros', 1);

$mentor->run();
