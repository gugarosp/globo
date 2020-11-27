<?php

// Removendo o tipo de post padrão do Wordpress
add_action("admin_menu", "removePostPadrao" );

function removePostPadrao() {
    remove_menu_page("edit.php");
}

// Habiliando o suporte desta tema à imagens destacadas
add_theme_support("post-thumbnails");

// Função para criar novos tipos de post
function novoTipoPost($nomeTipoPost, $nomeSingularPost, $nomeSlugPost) {
    register_post_type( $nomeSlugPost,
    
        array (
            "labels" => array (
                "name"              => __($nomeTipoPost),
                "singular_name"     => __($nomeSingularPost)
            ),
            "public"                => true,
            "has_archive"           => true,
            "rewrite"               => array ("slug" => $nomeSlugPost),
            "show_in_rest"          => true,
            "taxonomies"            => array ("category", "post_tag"),
            "supports"              => array ("title", "editor", "comments", "thumbnail"),
            'menu_icon'             => get_template_directory_uri()."/icones-admin/icone-".$nomeSlugPost.".svg"
         )

    );
}

// Criando novos tipos de post
add_action( "init", 
    function() {
        novoTipoPost("Artigos do G1", "Artigo do G1", "g1");
        novoTipoPost("Artigos do Ge", "Artigo do Ge", "ge");
        novoTipoPost("Artigos do Gshow", "Artigo do Gshow", "gshow");
        novoTipoPost("Artigos do Techtudo", "Artigo do Techtudo", "techtudo");
    }
);

?>