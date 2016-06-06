<?php

namespace Mentor;

use Mentor\ServiceManager\ServiceManager;
use Mentor\Config\Config;

class Application
{

    public serviceManager;

    public function __construct()
    {

        $this->serviceManager = new ServiceManager();
        $this->config = new Config();

    }

}
