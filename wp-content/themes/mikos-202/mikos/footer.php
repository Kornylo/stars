<!--CONTACT-->
<?php
$hide_contact = mikos_option("hide_contact_section");
$hide_title = mikos_option("hide_contact_title");
$contact_title = mikos_option("contact_title");
$contact_sub_title = mikos_option("contact_sub_title");
$contact_address = mikos_option("contact_address");
$contact_email = mikos_option("contact_email");
$contact_number = mikos_option("contact_number");
$contact_shortcode = mikos_option("contact_shortcode");
$contact_button_text = mikos_option("contact_button_text");
$map_coordinates = mikos_option("map_coordinates");
$map_marker = mikos_option("map_marker_image");
$show_contact = mikos_option("show_contact_form");
if($hide_contact != 1){
?>
<section id="contact" data-stellar-background-ratio="0.5">
    <div class="container-fluid">

		<div class="col-md-6 info">
			<?php if($hide_title != 1){ ?>
			<div class="tittle">
				<h3 class="white"><?php if(!empty($contact_title)){ echo esc_html($contact_title); }else{ echo "Contacts";} ?></h3>

			</div>
			<?php } ?>
			<div class="contact-info"><hr>
				<ul class="row">

          <?php if(
                    empty($contact_address)
                and empty($contact_email)
                and empty($contact_number)
                ) {
             ?>
            <?php if ( is_user_logged_in() ) {?>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
     						<p><?php echo esc_html__( 'Please add the data to the theme options', 'mikos' );  ?></p>
              </li>
            <?php } else { ?>
              <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    						<p><?php echo esc_html__( '{address}', 'mikos' ); ?></p>
    					</li>
               <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
     						<p><?php echo esc_html__( '{email}', 'mikos' );  ?></p>
     					</li>
               <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
     						<p> <?php echo esc_html__( '{phone}";', 'mikos' );   ?></p>
     					</li>
            <?php } ?>

             <?php
          } ?>

					<?php if( !empty($contact_address) ){ ?>
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
						<p><?php echo esc_attr($contact_address); ?></p>
					</li>
					<?php } if( !empty($contact_email) ){ ?>
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
						<p><?php echo sanitize_email($contact_email); ?></p>
					</li>
					<?php } if( !empty($contact_number) ){ ?>
					<li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
						<p> <?php echo esc_attr($contact_number); ?></p>
					</li>
					<?php } ?>
				</ul>
			</div>

			<?php if( $show_contact ) { ?>
				<div class="drop-line wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
					<?php if(!empty($contact_button_text)){ ?>
					<a id="trigger-overlay" class="btn"><?php echo esc_attr($contact_button_text); ?></a>
					<?php } else { ?>
						<a id="trigger-overlay" class="btn"><?php echo esc_attr_e("DROP US A LINE", 'mikos'); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
      <div class="social_icons">
				<ul>
					<?php
					$facebook = mikos_option("facebook");
					$twitter = mikos_option("twitter");
					$dribble = mikos_option("dribble");
					$google = mikos_option("google");
					$linkedin = mikos_option("linkedin");
					$pinterest = mikos_option("pinterest");
					if(!empty($facebook)){
					?>
					<li class="facebook wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
						<a href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook"></i> </a>
					</li>
					<?php } if(!empty($twitter)){ ?>
					<li class="twitter wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
						<a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter"></i> </a>
					</li>
					<?php } if(!empty($dribble)){ ?>
					<li class="dribbble wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
						<a href="<?php echo esc_url($dribble); ?>"><i class="fa fa-dribbble"></i> </a>
					</li>
					<?php } if(!empty($google)){ ?>
					<li class="googleplus wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
						<a href="<?php echo esc_url($google); ?>"><i class="fa fa-google"></i> </a>
					</li>
					<?php } if(!empty($linkedin)){ ?>
					<li class="linkedin wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
						<a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin"></i> </a>
					</li>
					<?php } if(!empty($pinterest)){ ?>
					<li class="pinterest wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
						<a href="<?php echo esc_url($pinterest); ?>"><i class="fa fa-pinterest"></i> </a>
					</li>
					<?php } ?>
				</ul>
			</div>
			
			<div class="overlay-pop overlay-scale"> <a class="overlay-close"></a>
				<div class="container">
					<div class="form-up">
						<div id="contact_form">
							<div class="row">
								<div class="col-md-12">
									<?php if(!empty($contact_shortcode)){
									echo do_shortcode($contact_shortcode);
									} else { ?>
										<p class="white"><?php esc_attr_e("Enter Your Contact Form 7 Shortcode in Mikos Options!", 'mikos'); ?></p>
									<?php } ?>
								</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

 </div>
 <div class="map col-md-6" id="mikosMap" data-marker="<?php echo esc_attr( $map_marker ); ?>" data-coordinates="<?php if ( !empty($map_coordinates) ) { echo esc_attr( $map_coordinates ); } else { echo "-22.996228,-43.2296704"; }  ?>"></div>
</div>
</section>
<?php } ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
