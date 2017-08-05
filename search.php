<?php get_header(); ?>
<div class="container">    
    <div class="margin-top-lg margin-bottom-lg">
        <h1 class="text-center pages-title">
            <?php echo sprintf( __( '%s Search results for: ', 'dare2believe' ), 
            $wp_query->found_posts ); echo get_search_query(); ?>
        </h1>
        <?php get_template_part( 'loop'); ?>
        <?php get_template_part( 'pagination'); ?>
    </div>
</div>
<?php get_footer(); ?>