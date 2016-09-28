<?php

namespace MentorConfig\Resource\Support\NavMenu;

use MentorConfig\Resource\ResourceConfigInterface;
use MentorConfig\Resource\ResourceRegisterInterface;
use Zend\Config\Config;

class NavMenuConfig implements ResourceRegisterInterface, ResourceConfigInterface
{

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        if (empty($this->config->nav_menu)) return;
        if (empty($this->config->nav_menu->register)) return;

        $this->register();
    }

    public function register()
    {
        $menus = $this->config->nav_menu->register->toArray();
        register_nav_menus($menus);
    }

}