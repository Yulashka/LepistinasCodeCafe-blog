<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 */

get_header(); ?>

<div>

<?php
	if ( is_front_page() && dare2believe_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<div class="container">
		<div class="row" role="main">
             <div class="col-sm-12 margin-top-lg ">
                 <div class="pull-right"><?php edit_post_link(); // Always handy to have Edit Post Links available ?></div>
                  <h1 class='single-post-title' title="<?php the_title(); ?>"><?php the_title(); ?></h1>
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
                 
					get_template_part( 'content', 'page' );
                    the_content(); ?>
                 <div class="text-center link-pages margin-top-lg"><?php wp_link_pages(); ?></div>

                 <div class="text-center post-pagination">
                     <div class="previous-post-link"><?php previous_post_link(); ?></div>
                      <div class="next-post-link"><?php next_post_link(); ?></div>
                 </div>
                    
                   <?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
                 
                 
            </div>
		</div><!-- #content -->
        
	</div><!-- #primary -->
        
    <?php
    $description = get_bloginfo( 'description', 'display' );
    if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description text-center margin-top-lg font-size20px"><?php echo esc_html( $description ); ?></h2>
	<?php endif; ?>

</div><!-- #main-content -->

<?php
get_sidebar();

get_footer();
?>