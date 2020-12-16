<?php

function test_scripts() {
    wp_enqueue_style('test-bootstrap', get_template_directory_uri(). '/assets/bootstrap/css/bootstrap.css');
    wp_enqueue_style('test-style', get_template_directory_uri(). '/assets/style.css' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', [], false, true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script('test-popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', ['query']);
    wp_enqueue_script('test-bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js',['jquery'], false, true);
    wp_enqueue_script( 'test-ja', get_template_directory_uri() . '/assets/bootstrap/js/ja.js', ['jquery'], false, true );
}

add_action('wp_enqueue_scripts', 'test_scripts');


function test_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'test_setup' );

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination( array(
    'end_size' => 2,
) );
