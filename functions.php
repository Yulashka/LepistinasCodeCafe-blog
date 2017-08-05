<?php
/*
Registration, setup and helpers for dare2believe
*/
?>
<?php

function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('dare2believescripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true); 
        wp_register_script('bootstrap-js', get_template_directory_uri() . '/dist/bootstrap/js/bootstrap.min.js', array('jquery'), '', true); 
        wp_enqueue_script('dare2believescripts');
        wp_enqueue_script('bootstrap-js');
    }
}

function my_styles()
{
    wp_register_style('dare2believe', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/dist/bootstrap/css/bootstrap.min.css' );
    wp_register_style( 'fa-css', get_template_directory_uri() . '/dist/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style('dare2believe'); 
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('fa-css'); 
}

function my_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

function summary_length($length) {
    return 50;
}

function summary($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function remove_admin_bar()
{
    return false;
}

function comments_cb($comment, $args, $depth)
{
?>
<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<div class="row comment-row">
    <div class="col-sm-1">
        
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 48 ); ?>
    </div>
    <div class="col-sm-11"> 
        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
             <?php
			printf( __('%1$s at %2$s by %3$s', 'dare2believe'), get_comment_date(),  get_comment_time(), get_comment_author_link()) ?></a><?php edit_comment_link(__('(Edit)', 'dare2believe'),'  ','' );
		      ?>
            <?php comment_text() ?>
	   </div>
    </div>
</div>
<?php }


//Thumbnails
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 825, 510, true );

// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Navigation Menu', 'dare2believe' ) );


/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
// add post-formats to post_type 'page'
add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'caption', 'page', 'post-formats' ) );
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_editor_style();

// add post-formats to post_type 'page'
add_post_type_support( 'page', 'post-formats' );

add_action('init', 'header_scripts');
add_action('wp_enqueue_scripts', 'my_styles');
add_action('init', 'my_pagination');

remove_action('wp_head', 'index_rel_link'); 
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0); 
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_filter('show_admin_bar', 'remove_admin_bar');

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

$linkpages = array(
    'before'           => '<p>' . __( 'Pages:', 'dare2believe' ),
    'after'            => '</p>',
    'link_before'      => '',
    'link_after'       => '',
    'next_or_number'   => 'number',
    'separator'        => ' ',
    'nextpagelink'     => __( 'Next page', 'dare2believe' ),
    'previouspagelink' => __( 'Previous page', 'dare2believe' ),
    'pagelink'         => '%',
    'echo'             => 1
);
 
wp_link_pages( $linkpages );

function wpb_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'dare2believe' ),
		'id' => 'sidebar-1',
		'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'dare2believe' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>__( 'Front page sidebar', 'dare2believe'),
		'id' => 'sidebar-2',
		'description' => __( 'Appears on the static front page template', 'dare2believe' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	}

add_action( 'widgets_init', 'wpb_widgets_init' );

?>
