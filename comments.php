<div class="comments">
    <?php if (post_password_required()) : ?>
    <p>
        <?php _e( 'Post is password protected. Please enter your password to view any comments.', 'dare2believe' ); ?>
    </p>
</div>
<?php return; endif; ?>
<?php if (have_comments()) : ?>
<h2><?php comments_number(); ?></h2>

<ul id="comment-single-post">
    <?php wp_list_comments( 'type=comment&callback=comments_cb'); ?>
</ul>
 
<div class="navigation container">
    <div class="alignleft lead entry-details font-size16px margin-bottom-sm"><?php previous_comments_link(); ?></div>
    <div class="alignright lead entry-details font-size16px margin-bottom-sm"><?php next_comments_link(); ?></div>   
</div>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <div class="text-center margin-bottom-sm entry-details font-size16px"><?php _e( 'Comments are closed.', 'dare2believe' ); ?></div>
<?php endif; ?>
<?php comment_form(array(
    'title_reply'=>'Share your thoughts!',
    'comment_notes_after'=>'')); 
?>