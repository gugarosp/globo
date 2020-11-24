<?php

// Removendo o tipos de post padrão do Wordpress
add_action( 'admin_menu', 'removePostPadrao' );

function removePostPadrao() {
    remove_menu_page('edit.php');
}

// Habiliando o suporte a imagens destacadas
add_theme_support( 'post-thumbnails' );

//Criando novos tipos de post
function novoTipoPost($nomeTipoPost, $nomeSingularPost, $nomeSlugPost) {
    register_post_type( $nomeSlugPost,
    
        array(
            'labels' => array(
                'name' => __($nomeTipoPost),
                'singular_name' => __($nomeSingularPost)
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => $nomeSlugPost),
            'show_in_rest' => true,
            'taxonomies' => array('category'),
            'supports' => array('title', 'editor', 'thumbnail')
         )

    );
}

add_action( 'init', 
    function() {
        novoTipoPost('Artigos do G1', 'G1', 'g1');
        novoTipoPost('Artigos do Ge', 'Ge', 'ge');
        novoTipoPost('Artigos do Gshow', 'Gshow', 'gshow');
        novoTipoPost('Artigos do Techtudo', 'Techtudo', 'techtudo');
    }
);

?>