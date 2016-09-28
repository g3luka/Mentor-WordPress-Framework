<?php

namespace MentorConfig\Resource\PostType;

use MentorConfig\Resource\ResourceConfigInterface;
use MentorConfig\Resource\ResourceRegisterInterface;
use Zend\Config\Config;

class PostTypeConfig implements ResourceConfigInterface, ResourceRegisterInterface
{

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        if (empty($this->config->post_type)) return;
        if (empty($this->config->post_type->register)) return;

        add_action('init', array($this, 'register'));
    }

    public function register()
    {
        $postTypes = $this->config->post_type->register->toArray();

        foreach ($postTypes as $name => $arguments) {
            $label = ( ! empty($arguments['label'])) ? $arguments['label'] : $arguments['labels']['name'];
            $postType = new PostType($label, $name);
            $postType->setArguments($arguments);
            $postType->register();
        }

    }

}
