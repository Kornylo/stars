<?php
/*
 * Template Name: About Page
 */
get_header();
$padding_top = get_field("page_top_padding");
$padding_bottom = get_field("page_bottom_padding");
$page_layout = get_field("page_layout");
$hide_page_title = get_field("hide_page_title");
?>
            <section id="<?php echo esc_attr($post->post_name); ?>" style="padding: 0;">
                <div class="<?php if($section_fullwidth != 1){ ?>container<?php } ?>">

						<?php
						while(have_posts()): the_post();
							?>
						<div class=row>

							<div class=col-md-6>
								<div class=container-fluid  style="<?php if(!empty($padding_top)){ echo 'padding-top: '.$padding_top.'px;';} if(!empty($padding_bottom)){ echo 'padding-bottom: '.$padding_bottom.'px;';} ?>">
									<?php if($hide_page_title != 1){ ?>
									<div class="tittle">
										<?php $sub_title = get_field("page_sub_title",$page_id); ?>
										<h2><?php the_title(); ?></h2>
										<?php if(!empty($sub_title)){ ?>
											<hr>
											<p><?php echo esc_html($sub_title); ?></p>
										<?php } } ?>
									</div>
									<?php
									the_content();
								?>
								</div>
							</div>
              <div class=col-md-6>
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('style', 'width:100%;')); }  ?>
							</div>
						</div>
						<?php
						endwhile;
						?>

				</div>
            </section>
<?php get_footer(); ?>
