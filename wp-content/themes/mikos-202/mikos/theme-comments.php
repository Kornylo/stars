<?php
/**
 * Theme Comments
 * @Mikos
 * @Mikos 1.0
 **/
?>
<?php
// load comment scripts only on single pages
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
?>
