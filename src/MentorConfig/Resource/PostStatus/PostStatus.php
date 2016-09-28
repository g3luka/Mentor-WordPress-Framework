<?php

namespace MentorConfig\Resource\PostStatus;

use MentorConfig\Resource\ResourceRegisterInterface;

/**
 * PostStatus class.
 *
 * Built Custom Post Status.
 *
 * @package  MentorConfig
 * @category Post Status
 * @author   g3luka
 * @since  0.1
 */
class PostStatus implements ResourceRegisterInterface
{

	/**
     * Post Status slug name
     * @var string
     */
    protected $name;

	/**
	 * Array of the arguments
	 * @var array
	 */
	protected $arguments;

	/**
     * PostStatus constructor.
     * @param $name string
     * @param bool $autoRegister
     */
	public function __construct($name, $autoRegister = false)
	{
		$this->name = $name;
        $this->arguments['label'] = ucfirst($name);
        $this->arguments['show_in_admin_all_list'] = true;

		if ($autoRegister) {
			$this->register();
		}
	}

    /**
     * Set arguments to post status
     * @param array $arguments
     */
    public function setArguments(array $arguments = array())
    {
        $default = array(
			'label'                     => _x($this->name, 'Status General Name', 'mentor'),
			'label_count'               => _n_noop($this->name.' (%s)',  ucfirst($this->name).' (%s)', 'mentor'),
			'public'                    => true,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'exclude_from_search'       => false
        );
        $this->arguments = array_merge($default, $arguments);
    }

    /**
     * Register the post type
     */
    public function register()
    {
        register_post_status($this->name, $this->arguments);

        if ($this->arguments['show_in_admin_all_list']) {
            $this->showInAdmin();
        }
    }

    public function showInAdmin()
    {
        add_action('admin_footer-edit.php', array($this, 'inlineEdit'));
        add_action('admin_footer-post.php', array($this, 'displayStatusList'));
        add_filter('display_post_states', array($this, 'displayStatusLabel'));
    }

    public function displayStatusList()
    {
        global $post;
        $complete = '';
        $label = '';
        if ($post->post_status == $this->name) {
            $complete = ' selected="selected"';
            $label = $this->arguments['label'];
        }
        echo <<<EOT
        <script>
            jQuery(document).ready(function() {
                jQuery("select#post_status").append('<option value="$this->name" $complete>{$this->arguments['label']}</option>');
                jQuery("#post-status-display").append('{$label}');
            });
        </script>
EOT;
    }

    public function inlineEdit()
    {
        echo <<<EOT
        <script>
            jQuery(document).ready(function() {
                jQuery('select[name="_status"]').append('<option value="$this->name">{$this->arguments['label']}</option>');
            });
        </script>";
EOT;
    }

    public function displayStatusLabel($statuses)
    {
        global $post;
        if (get_query_var('post_status') != $this->name) {
            if ($post->post_status == $this->name) {
                return array($this->arguments['label']);
            }
        }
        return $statuses;
    }

}
