<?php get_header(); ?>
    <div class="content sub-pages">
        <section class="error-page">
            <div class="container">
                <?php $four = mikos_option("we_404");
                if(!empty($four)){
                    echo wp_kses( $four, array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'h1' => array(),
					'h2' => array(),
					'h3' => array(),
					'h4' => array(),
					'h5' => array(),
					'h6' => array(),
					'p' => array(),
					'br' => array(),
					'em' => array(),
					'strong' => array()
					) );
                } else { ?>
				<h1><?php esc_attr_e('Page not found', 'mikos'); ?></h1>
				<div  class="col-md-6 col-md-offset-3" >
					<p><?php esc_attr_e('Unfortunately, such a page does not exist. Use the top menu or search on the site below.', 'mikos'); ?></p>
					<?php } ?>
					<div class="search">
						<?php get_search_form(); ?>
					</div>
				</div>
            </div>
        </section>
        <?php get_footer(); ?>
