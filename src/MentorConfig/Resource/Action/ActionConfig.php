<?php

namespace MentorConfig\Resource\Action;

use MentorConfig\Resource\ResourceConfigInterface;
use Zend\Config\Config;

class ActionConfig implements ResourceConfigInterface
{

    private $add;
    private $remove;

    public function __construct(Config $config)
    {
        if ( ! empty($config->action->add)) {
            $this->add = $config->action->add->toArray();
        }

        if ( ! empty($config->action->remove)) {
            $this->remove = $config->action->remove->toArray();
        }
    }

    public function process()
    {
        if ( ! empty($this->remove)) {
            $this->remove();
        }

        if ( ! empty($this->add)) {
            $this->add();
        }
    }

    public function add()
    {

        foreach ($this->add as $tag => $arguments) {
            foreach ($arguments as $action) {
                $action = $this->parse($action);
                if (empty($action['function'])) continue;
                add_action($tag, $action['function'], $action['priority'], $action['args']);
            }
        }
    }

    public function remove()
    {
        foreach ($this->remove as $tag => $arguments) {
            foreach ($arguments as $action) {
                $action = $this->parse($action);
                if (empty($action['function'])) continue;
                remove_action($tag, $action['function'], $action['priority']);
            }
        }
    }

    public function parse(array $action)
    {
        $defaults = array(
            'function'  => false,
            'priority'  => 10,
            'args'      => 1
        );
        return array_merge($defaults, $action);
    }

}