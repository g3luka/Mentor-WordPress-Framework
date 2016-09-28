<?php

namespace MentorConfig\Config;

use MentorConfig\Resource\PostType\PostTypeConfig;

class Config
{

    public function __construct(array $appConfig)
    {
        $this->appConfig = $appConfig;
    }

    private function load()
    {

        if (isset($this->appConfig['post_type'])) {
            new PostTypeConfig($this->appConfig['post_type']);
        }

    }

}