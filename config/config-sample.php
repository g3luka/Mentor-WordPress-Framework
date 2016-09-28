<?php

return array(

    'post_type' => array(
        'register'  => array(

            'product' => array(
                'labels' => array(),
    			'public' => true,
    			'publicly_queryable' => true,
    			'show_ui' => true,
    			'show_in_menu' => true,
    			'query_var' => true,
    			'rewrite' => array('slug' => 'product'),
    			'capability_type' => 'post',
    			'has_archive' => true,
    			'hierarchical' => false,
    			'menu_position' => null,
                'exclude_from_search' => false,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            ),

        )
    ),

    'taxonomy' => array(
        'register' => array(

            'product_cat' = array(
    			'hierarchical' => true,
    			'labels' => array(),
    			'show_ui' => true,
    			'query_var' => true,
    			'rewrite' => array('slug' => 'departament')
    		)

        )
    ),

    'metabox' => array(
        'register' => array(
            'product-type' => array(
                'title' => 'Tipo de Produto',
                'post_type' => 'product'
            ),
            'product-cofig' => array(
                'title' => 'Configurações do Produto',
                'post_type' => 'product'
            )
        )
    ),

    'action|filter' => array(

        'add' => array(
            'init' => array(
                array(
                    'function' => 'function_name',
                    'priority' => 10
                ),
                array(
                    'function' => array('ClassName', 'staticMethodName'),
                    'priority' => 1
                ),
                array(
                    'function' => array($object, 'methodName')
                )
            ),
            'publish_post' => array(
                array(
                    'function' => 'function_name'
                )
            )
        ),

        'remove' => array(
            'init' => array(
                array(
                    'function' => 'function_name',
                    'priority' => 10
                ),
            )
        )

    ),

);
