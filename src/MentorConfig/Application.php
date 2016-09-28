<?php

namespace MentorConfig;

use Pimple\Container;
use Zend\Config\Config;
use MentorConfig\Resource\PostType\PostTypeConfig;
use MentorConfig\Resource\PostStatus\PostStatusConfig;
use MentorConfig\Resource\Support\NavMenu\NavMenuConfig;

class Application extends Container
{

    const VERSION = '0.1a';

    public function __construct(array $config = array())
    {
        parent::__construct();

        $this['configRaw'] = $config;
        $this['config'] = new Config($config);

        $this['PostTypeConfig'] = new PostTypeConfig($this['config']);
        $this['PostStatusConfig'] = new PostStatusConfig($this['config']);
        $this['NavMenuConfig'] = new NavMenuConfig($this['config']);
    }

    public function run()
    {
        $this['PostTypeConfig']->process();
        $this['PostStatusConfig']->process();
        $this['NavMenuConfig']->process();
    }

}
