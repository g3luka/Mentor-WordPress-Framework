<?php

require __DIR__."/Mentor/vendor/autoload.php";

$appConfig = include __DIR__."/App/config.php";

$app = Mentor\Application();
$app->setAppConfig($appConfig);
$app->run();
