<?php

namespace MentorConfig\Resource\Filter;

use MentorConfig\Resource\ResourceConfigInterface;
use Zend\Config\Config;

class FilterConfig implements ResourceConfigInterface
{

    private $add;
    private $remove;

    public function __construct(Config $config)
    {
        if ( ! empty($config->filter->add)) {
            $this->add = $config->filter->add->toArray();
        }

        if ( ! empty($config->filter->remove)) {
            $this->remove = $config->filter->remove->toArray();
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
            foreach ($arguments as $filter) {
                $filter = $this->parse($filter);
                if (empty($filter['function'])) continue;
                add_filter($tag, $filter['function'], $filter['priority'], $filter['args']);
            }
        }
    }

    public function remove()
    {
        foreach ($this->remove as $tag => $arguments) {
            foreach ($arguments as $filter) {
                $filter = $this->parse($filter);
                if (empty($filter['function'])) continue;
                remove_filter($tag, $filter['function'], $filter['priority']);
            }
        }
    }

    public function parse(array $filter)
    {
        $defaults = array(
            'function'  => false,
            'priority'  => 10,
            'args'      => 1
        );
        return array_merge($defaults, $filter);
    }

}