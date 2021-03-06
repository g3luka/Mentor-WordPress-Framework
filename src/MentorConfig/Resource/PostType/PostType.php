<?php

namespace MentorConfig\Resource\PostType;

use MentorConfig\Resource\ResourceRegisterInterface;

/**
 * PostType class.
 *
 * Built Custom Post Types.
 *
 * @package  MentorConfig
 * @category Post Types
 * @author   g3luka
 * @since  0.1
 */
class PostType implements ResourceRegisterInterface
{

    /**
     * Post Type label name
     * @var string
     */
    protected $label;

    /**
     * Post Type slug name
     * @var string
     */
    protected $name;

    /**
     * Post Type array labels
     * @var array
     */
    protected $labels;

    /**
     * Array of the arguments
     * @var array
     */
    protected $arguments;

    /**
     * PostType constructor.
     * @param $label string
     * @param $name string
     * @param bool $autoRegister
     */
    public function __construct($label, $name, $autoRegister = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->arguments['label'] = $label;

        if ($autoRegister) {
            $this->register();
        }
    }

    /**
     * Set labels to post type
     * @param array $labels
     * @return array
     */
    public function setLabels(array $labels)
    {
        $default = array(
            'name'               => sprintf(__('%ss', 'mentor'), $this->label),
            'singular_name'      => sprintf(__('%s', 'mentor'), $this->label),
            'view_item'          => sprintf(__('View %s', 'mentor'), $this->label),
            'edit_item'          => sprintf(__('Edit %s', 'mentor'), $this->label),
            'search_items'       => sprintf(__('Search %s', 'mentor'), $this->label),
            'update_item'        => sprintf(__('Update %s', 'mentor'), $this->label),
            'parent_item_colon'  => sprintf(__('Parent %s:', 'mentor'), $this->label),
            'menu_name'          => sprintf(__('%ss', 'mentor'), $this->label),
            'add_new'            => __('Add New', 'mentor'),
            'add_new_item'       => sprintf(__('Add New %s', 'mentor'), $this->label),
            'new_item'           => sprintf(__('New %s', 'mentor'), $this->label),
            'all_items'          => sprintf(__('All %ss', 'mentor'), $this->label),
            'not_found'          => sprintf(__('No %s found', 'mentor'), $this->label),
            'not_found_in_trash' => sprintf(__('No %s found in Trash', 'mentor'), $this->label)
        );
        $this->labels = array_merge($default, $labels);
    }

    /**
     * Set arguments to post type
     * @param array $arguments
     */
    public function setArguments(array $arguments)
    {
        $default = array(
            'labels'              => $this->labels,
            'hierarchical'        => false,
            'supports'            => array('title', 'editor', 'thumbnail'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => true,
            'capability_type'     => 'post'
        );
        $this->arguments = array_merge($default, $arguments);
    }

    /**
     * Register the post type
     */
    public function register()
    {
        register_post_type($this->name, $this->arguments);
    }

}
