<?php

namespace MentorConfig\Resource\PostStatus;

use MentorConfig\Resource\ResourceConfigInterface;
use MentorConfig\Resource\ResourceRegisterInterface;
use Zend\Config\Config;

class PostStatusConfig implements ResourceConfigInterface, ResourceRegisterInterface
{

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function process()
    {
        if (empty($this->config->post_status)) return;
        if (empty($this->config->post_status->register)) return;

        add_action('init', array($this, 'register'));
    }

    public function register()
    {
        $postsStatus = $this->config->post_status->register->toArray();

        foreach ($postsStatus as $name => $arguments) {
            $postStatus = new PostStatus($name);
            $postStatus->setArguments($arguments);
            $postStatus->register();
        }

    }

}
