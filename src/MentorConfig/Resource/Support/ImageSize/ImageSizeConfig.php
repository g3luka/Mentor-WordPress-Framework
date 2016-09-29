<?php

namespace MentorConfig\Resource\Support\ImageSize;

use MentorConfig\Resource\ResourceConfigInterface;
use Zend\Config\Config;

class ImageSizeConfig implements ResourceConfigInterface
{

    private $add;
    private $remove;

    public function __construct(Config $config)
    {
        if ( ! empty($config->support->image_size->add)) {
            $this->add = $config->support->image_size->add->toArray();
        }

        if ( ! empty($config->support->image_size->remove)) {
            $this->remove = $config->support->image_size->remove->toArray();
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

        foreach ($this->add as $size) {
            $size = $this->parse($size);
            add_image_size($size['slug'], $size['width'], $size['height'], $size['crop']);

            if ($size['name']) {
                add_filter('image_size_names_choose', function($sizes) {
                    return array_merge($sizes, array(
                        $size['slug'] => $size['name']
                    ));
                });
            }

        }
    }

    public function remove()
    {
        foreach ($this->remove as $size) {
//            foreach ($arguments as $filter) {
//                $filter = $this->parse($filter);
//                if (empty($filter['function'])) continue;
//                remove_filter($tag, $filter['function'], $filter['priority']);
//            }
        }
    }

    public function parse(array $filter)
    {
        $defaults = array(
            'slug'      => false,
            'width'     => 0,
            'height'    => 0,
            'crop'      => false,
            'name'      => false
        );
        return array_merge($defaults, $filter);
    }

}