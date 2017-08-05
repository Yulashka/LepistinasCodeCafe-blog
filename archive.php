<?php get_header(); ?>
<div class="container">    
    <div class="margin-top-lg margin-bottom-lg">
        <h1 class="text-center pages-title"><?php _e( 'Archives', 'dare2believe' ); ?></h1>
        <?php get_template_part( 'loop'); ?>
        <?php get_template_part( 'pagination'); ?>
    </div>
</div>
<?php get_footer(); ?>
