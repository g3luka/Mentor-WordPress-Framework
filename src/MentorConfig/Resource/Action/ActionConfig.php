<?php

namespace MentorConfig\Resource\Action;

use MentorConfig\Resource\ResourceConfigInterface;
use Zend\Config\Config;

class ActionConfig implements ResourceConfigInterface
{

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        if (empty($this->config->action)) return;
        if (empty($this->config->action->add)) return;

        $this->add();
    }

    public function add()
    {
        $addActions = $this->config->action->add->toArray();

        foreach ($addActions as $tag => $arguments) {
            $this->attach($tag, $arguments);
        }
    }

    public function attach($name, array $arguments)
    {
        foreach ($arguments as $action) {
            $defaults = array(
                'function'  => false,
                'priority'  => 10,
                'args'      => 1
            );
            $action = array_merge($defaults, $action);

            if (empty($action['function'])) continue;

            add_action($name, $action['function'], $action['priority'], $action['args']);
        }
    }

}