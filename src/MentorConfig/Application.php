<?php

namespace MentorConfig;

use Pimple\Container;
use Zend\Config\Config;
use MentorConfig\Resource\PostType\PostTypeConfig;
use MentorConfig\Resource\PostStatus\PostStatusConfig;
use MentorConfig\Resource\Action\ActionConfig;
use MentorConfig\Resource\Filter\FilterConfig;
use MentorConfig\Resource\Support\NavMenu\NavMenuConfig;
use MentorConfig\Resource\Support\ThemeSupport\ThemeSupportConfig;
use MentorConfig\Resource\Support\ImageSize\ImageSizeConfig;

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
        $this['ActionConfig'] = new ActionConfig($this['config']);
        $this['FilterConfig'] = new FilterConfig($this['config']);
        $this['NavMenuConfig'] = new NavMenuConfig($this['config']);
        $this['ThemeSupportConfig'] = new ThemeSupportConfig($this['config']);
        $this['ImageSizeConfig'] = new ImageSizeConfig($this['config']);
    }

    public function run()
    {
        $this['PostTypeConfig']->process();
        $this['PostStatusConfig']->process();
        $this['ActionConfig']->process();
        $this['FilterConfig']->process();
        $this['NavMenuConfig']->process();
        $this['ThemeSupportConfig']->process();
        $this['ImageSizeConfig']->process();
    }

}
