<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="container">
    <div class="row">
        <!-- if there is a sidebar, make space on the left, else take full row -->
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="col-sm-9 col-sm-push-3 margin-top-lg entry-content" id="post-<?php the_ID(); ?>">
        <?php else: ?>
            <div class="col-sm-12 margin-top-lg entry-content" id="post-<?php the_ID(); ?>"> 
        <?php endif; ?>
            <div class="pull-right"><?php edit_post_link(); // Always handy to have Edit Post Links available ?></div>
                <div <?php post_class(); ?>>
            <h1 class='single-post-title' title="<?php the_title(); ?>"><?php the_title(); ?></h1>
            <div class="lead entry-details font-size16px" id="post-detail">
                <p class="text-center margin-top-sm margin-bottom-sm">Written by
                    <?php the_author_posts_link(); ?> on <span class="date"><?php the_time('F j, Y'); ?></span>
                </p>
            </div>
                <?php the_content();?>
            </div>
            <div class="text-center link-pages margin-top-lg"><?php wp_link_pages(); ?></div>

            <div class="margin-top-sm">
                <p class="lead entry-details font-size16px" id="category">
                    <?php _e( 'Categories: ', 'dare2believe' ); the_category( ', '); ?>
                </p>
            </div>
        </div> 
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="col-sm-3 col-sm-pull-9 margin-top-lg">
                <?php get_sidebar (); ?>
            </div>
        <?php endif; ?>
        <div class="text-center post-pagination">
            <div class="previous-post-link"><?php previous_post_link(); ?></div>
            <div class="next-post-link"><?php next_post_link(); ?></div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php 
            $description = get_bloginfo( 'description', 'display' );
            if ( ! empty ( $description ) ) :?>

            <h2 class="site-description text-center margin-top-lg font-size20px"><?php echo esc_html( $description ); ?></h2>
        <?php endif; ?>
        
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php comments_template(); ?>
        </div>
    </div>
    </div>
</div>


<?php get_footer(); ?>
