<?php get_header(); ?>
<?php $author=( isset($_GET[ 'author_name'])) ? get_user_by( 'slug', $author_name) : get_userdata(intval($author)); ?>

<div class="container">    
    <div class="margin-top-lg margin-bottom-lg">
        <div class="author-page">
            <h1 class="text-center pages-title">About: <?php echo $author->nickname; ?></h1>
            <a href="http://lepistinacodecafe.com/wp-content/uploads/2016/05/Iuliia-e1463592451757.jpg"><img src="http://lepistinacodecafe.com/wp-content/uploads/2016/05/Iuliia-e1463592451757.jpg" alt="author-pic" class=" size-small img-responsible" />
            </a>
            <dl>
                <dd><i class="font-size20px">Iuliia</i></dd> 
                <dd>: Iuliia is Slavic female given name, the equivalent of the Latin Julia. </dd>
                <dd><?php echo $author->user_description; ?></dd>
            </dl>
            <h2 class="text-center">Posts by <?php echo $author->nickname; ?>:</h2>
            <ul class="text-center author-posts-list margin-bottom-sm">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php wp_title(); ?>">
                        <?php the_title(); ?>
                    </a>,
                    <?php  the_time( get_option( 'date_format') ); ?> in
                    <?php the_category( '&');?>
                </li>
                <?php endwhile; else: ?>
                <p>
                    <?php _e( 'No posts.', 'dare2believe'); ?>
                </p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php get_footer(); ?>