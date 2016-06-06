<?php

return array(
    'post_type' => array(),             // Registra custom post types no WordPress
    'metabox' => array(),               // Registra custom metabox para os post types
    'shortcode' => array(),             // Registra shortcodes
    'post_status' => array(),           // Registra custom post status para os post types
    'taxonomy' => array(),              // Registra custom taxonomies
    'term_meta' => array(),             // Adiciona custom fields as taxonomies
    'nav_menu' => array(),              // registra áreas de menu
    'widget' => array(),                // registra widgets
    'thumbnail' => array(),             // Seta tamanhos às imagens
    'support' => array(),               // Habilita theme supports
    'action' => array(),                // Adiciona aos hooks; usa o add_action()
    'filter' => array(),                // Adiciona filtros; usa o add_filter()
    'options' => array(),               // Seta options globais para configurações
    'admin' => array(),                 // Configurações para o wp-admin; registra custom fields
    'query' => array(),                 // Registra queries personalizadas; intercepta requisições
    'form' => array(),                  // Cria formulários e suas validações
    'ajax' => array(),                  // Liberações de permissão de Ajax
    'user' => array(),                  // Seta configurações de usuários e custom fields
    'rest' => array(),                  // Seta configurações para o WP_REST_SERVER
    'cron' => array(),                  // Configurações das tarefas agendadas
    'route' => array(),                 // Trabalha com o WP_Rewrite; seta rotas personalizadas
    'assets' => array(),                // Registra e chama js e css; configurações de assets
);
