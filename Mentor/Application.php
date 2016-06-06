<?php

namespace Mentor;

use Mentor\ServiceManager\ServiceManager;
use Mentor\Config\Config;

class Application
{

    /**
     * @todo implements ServiceManager
     */
    public serviceManager;
    public $appConfig;

    public function __construct()
    {

        $this->serviceManager = new ServiceManager();
        $this->appConfig = include __DIR__ . '/../../App/config.php';
        $this->config = new Config($this->appConfig);

    }

}
