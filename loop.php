<!-- Keep count so we can display even/odd differently -->
<?php $count = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="container">    
    <div class="row margin-top-lg margin-bottom-lg">
        <div id="post-<?php the_ID(); ?>" <?php post_class('.sticky'); ?>>
            <?php if ( $count % 2) : // even row picture on the left ?>
            <?php if ( has_post_thumbnail()) : ?>
            <div class="col-md-5">
                <a class="featured-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail( array( 350, 350, true ) );?>
                </a>
            </div>
            
            <div class="col-md-7">
            <?php else: ?> <!-- if there is no featured picture, take up full row -->
            <div class="col-md-12">
            <?php endif; ?>
                
                <h2 class="featurette-heading text-center">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="text-center entry-details font-size16px">
                    <div class="text-center"><?php the_time('F j, Y'); ?></div>
                    <div class="text-center margin-top-xs"><?php the_tags(); ?></div>
                    <div class="comments text-center margin-bottom-sm"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'dare2believe' ), __( '1 Comment', 'dare2believe' ), __( '% Comments', 'dare2believe' )); ?></div>
                </div>
                <?php summary( 'summary_length');?>
                
                <a class="pull-right view-article margin-top-sm btn-black font-size16px black"  href="<?php the_permalink(); ?>">View Post</a> 
            </div>  
            <?php else: // odd row picture on the right ?>
    
            <?php if ( has_post_thumbnail()) :  ?>
            <div class="col-md-5 col-md-push-7">
                <a class="featured-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail( array(  350, 350, true ) ); ?>
                </a>
            </div>
            
            <div class="col-md-7 col-md-pull-5">
            <?php else: ?> <!-- if there is no featured picture, take up full row -->
            <div class="col-md-12">
            <?php endif; ?>
                <h2 class="featurette-heading text-center">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="text-center entry-details font-size16px">
                    <div class="text-center"><?php the_time('F j, Y'); ?></div>
                    <div class="text-center margin-top-xs"><?php the_tags(); ?></div>
                    <div class="comments text-center margin-bottom-sm"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'dare2believe' ), __( '1 Comment', 'dare2believe' ), __( '% Comments', 'dare2believe' )); ?></div>
                </div>
                <?php summary( 'summary_length'); ?>
                <a class="pull-left view-article margin-top-sm btn-black font-size16px black" href="<?php the_permalink(); ?>">View Post</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $count = $count + 1; ?> 

</div>
<?php endwhile; ?>

<?php else: ?>
<div>
    <h2 class="margin-top-lg"><?php _e( 'Sorry, nothing to display.', 'dare2believe' ); ?></h2>
</div>
<?php endif; ?>