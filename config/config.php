<?php

return array(
    'post_type' => array(
        'register' => array(

            'work' => array(
                'labels' => array(
                    'name' => 'Works',
                    'singular_name' => 'Work',
                    'menu_name' => 'Works'
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'works'),
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'menu_position' => 0,
                'exclude_from_search' => false,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            ),

        )
    ),

    'post_status' => array(
        'register' => array(


            'online' => array(
                'label' => 'Online'
            ),


        )
    ),

    'nav_menu' => array(
        'register' => array(

            'footer' => 'Menu do Rodapé',
            'user' => 'Menu do Usuário'

        )
    ),

    'support' => array(
        'add' => array(

            'post-formats' => array('aside', 'gallery'),

        )
    ),


    'action' => array(
        'add' => array(

            'init' => array(

//                array('function' => 'test_mentor_config_action')

            )

        )
    ),


    'filter' => array(
        'add' => array(

            'body_class' => array(

                array(
                    'function' => 'mentor_filter'
                )

            )

        ),

        'remove' => array(

            'body_class' => array(

                array(
                    'function' => 'mentor_filter'
                )

            )

        )

    ),


);

/*
return array(
    'post_type' => array(),             // Registra custom post types no WordPress
    'post_status' => array(),           // Registra custom post status para os post types
    'nav_menu' => array(),              // registra áreas de menu
    'support' => array(),               // Habilita theme supports
    'action' => array(),                // Adiciona aos hooks; usa o add_action()
    'filter' => array(),                // Adiciona filtros; usa o add_filter()

    'widget' => array(),                // registra widgets
    'shortcode' => array(),             // Registra shortcodes
    'thumbnail' => array(),             // Seta tamanhos às imagens
    'assets' => array(),                // Registra e chama js e css; configurações de assets
    'query' => array(),                 // Registra queries personalizadas; intercepta requisições
    'ajax' => array(),                  // Liberações de permissão de Ajax
    'rest' => array(),                  // Seta configurações para o WP_REST_SERVER
    'cron' => array(),                  // Configurações das tarefas agendadas
    'route' => array(),                 // Trabalha com o WP_Rewrite; seta rotas personalizadas

    'metabox' => array(),               // Registra custom metabox para os post types
    'taxonomy' => array(),              // Registra custom taxonomies
    'term_meta' => array(),             // Adiciona custom fields as taxonomies
    'options' => array(),               // Seta options globais para configurações
    'admin' => array(),                 // Configurações para o wp-admin; registra custom fields
    'form' => array(),                  // Cria formulários e suas validações
    'user' => array(),                  // Seta configurações de usuários e custom fields
);
*/
