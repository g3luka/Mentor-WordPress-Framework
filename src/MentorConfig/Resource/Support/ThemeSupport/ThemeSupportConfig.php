<?php

namespace MentorConfig\Resource\Support\ThemeSupport;

use MentorConfig\Resource\ResourceConfigInterface;
use Zend\Config\Config;

class ThemeSupportConfig implements ResourceConfigInterface
{

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        if (empty($this->config->support)) return;
        if (empty($this->config->support->add)) return;

        $this->add();
    }

    public function add()
    {
        $supports = $this->config->support->add->toArray();

        foreach ($supports as $name => $arguments) {
            if (is_int($name)) {
                add_theme_support($arguments);
                continue;
            }

            add_theme_support($name, $arguments);
        }
    }

}