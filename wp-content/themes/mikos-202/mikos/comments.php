<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<div class="comments">
    <?php if ( have_comments() ) : ?>
        <div class="head">
            <h5 class="pull-left"><?php printf( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'mikos' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h5>
        </div>
    <div class="com">
        <?php wp_list_comments('type=comment&callback=mikos_comment'); ?>
    </div>
    <div class="clear clearfix"></div>
        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'mikos' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'mikos' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'mikos' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
    <?php endif; // have_comments() ?>
</div>
    <?php
    $mikos_comments_args = array(
        // change the title of send button
        'label_submit'=>'Post Comment',
        'id_submit'=>'submit',
        'class_form'=>'comment-form',
        'id_form'=>'comments-form',
        // change the title of the reply section
        'title_reply'=>' ',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<textarea id="comment" class="form-control" rows="3" placeholder="Message" name="comment" aria-required="true"></textarea>',
    );
    ?>
    <?php if ( comments_open() ) : ?>
        <div class="com-form">
            <h5><?php esc_html_e('LEAVE A REPLY', 'mikos'); ?></h5>
            <?php comment_form($mikos_comments_args); ?>
        </div>
<?php endif; ?>
<script type="text/javascript">
    // Adding Button Class
    jQuery( document ).ready(function() {
        jQuery( "#submit" ).addClass( "btn btn-default" );
        // Adding Reply Class
        jQuery( ".comment-reply-link" ).addClass( "reply" );
        jQuery( ".reply" ).removeClass( "comment-reply-link" );
        jQuery( '.reply' ).html( '<i class="fa fa-reply"></i> Reply' );
    });
    // Adding Filed Place Holders
    jQuery(document).ready(function(){
        jQuery('.comment-form').find("#author").each(function(ev)
        {
            if(!jQuery(this).val()) {
                jQuery(this).attr("placeholder", "Your Name");
                jQuery(this).addClass("form-control");
            }
        });
        jQuery('.comment-form').find("#email").each(function(ev)
        {
            if(!jQuery(this).val()) {
                jQuery(this).attr("placeholder", "Your Email");
                jQuery(this).addClass("form-control");
            }
        });
        jQuery('.comment-form').find("#url").each(function(ev)
        {
            if(!jQuery(this).val()) {
                jQuery(this).attr("placeholder", "Your Website");
                jQuery(this).addClass("form-control");
            }
        });
    });
</script>
