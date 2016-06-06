<?php

namespace Mentor\PostType;

use Mentor\Config\ConfigProcessorInterface;

class PostTypeConfig implements ConfigProcessorInterface
{

    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        add_action('init', array($this, 'register'));
    }

    public function register()
    {
        if (isset($this->config['register'])) {
            foreach ($this->config['register'] as $postType => $arguments) {
                $label = (!empty($arguments['label'])) ? $arguments['label'] : $arguments['labels']['name'];
                $pt = new PostType($label, $postType);
                $pt->setArguments($arguments);
                $pt->register();
            }
        }
    }

}