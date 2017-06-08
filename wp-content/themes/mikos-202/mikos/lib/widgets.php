<?php
// Creating Popular Post Widget
class mikos_popular_posts_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'mikos_popular_posts_widget',
// Widget name will appear in UI
            esc_html__('Mikos Popular Posts', 'mikos'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for popular posts.', 'mikos' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'mikos_widget_title', $instance['title'] );
        $number_posts = apply_filters( 'mikos_number_posts', $instance['number_posts'] );
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
        if(!empty ($number_posts))
        $argo = array(
        'post_type' => 'post',
        'posts_per_page'    => $number_posts,
        'orderby' => 'comment_count',
        'order' => 'DESC',
		'post_status' => 'publish'
        );
        $query = new WP_Query( $argo ); ?>
        <div class="small-post">
        <ul class="popular-feed">
        <?php
        while($query->have_posts()): $query->the_post();
        ?>
            <li>
                <div class="small-img">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), array( 80, 80) ); ?></a>
                </div>
                <div class="post-text">
                    <span><?php echo get_the_time('M j, Y'); ?></span>
                    <p><?php mikos_excerpt(60); ?></p>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
        </div>
        <?php
        echo $args['after_widget'];
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "Popular Posts";
        }
        if ( isset( $instance[ 'number_posts' ] ) ) {
            $number_posts = $instance[ 'number_posts' ];
        } else {
            $number_posts = 5;
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number Of Posts:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>
    <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_posts'] = ( ! empty( $new_instance['number_posts'] ) ) ? strip_tags( $new_instance['number_posts'] ) : '';
        return $instance;
    }
} // Class mikos_popular_posts_widget ends here
// Register and load the widget
function mikos_pp_load_widget() {
    register_widget( 'mikos_popular_posts_widget' );
}
add_action( 'widgets_init', 'mikos_pp_load_widget' );
// Creating Social Icons Widget
class mikos_social_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'social_widget',
// Widget name will appear in UI
            esc_html__('Mikos Social Icons', 'mikos'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for Social Icons.', 'mikos' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'mikos_title', $instance['title'] );
        $facebook = apply_filters( 'mikos_facebook', $instance['facebook'] );
        $dribble = apply_filters( 'mikos_dribble', $instance['dribble'] );
        $twitter = apply_filters( 'mikos_twitter', $instance['twitter'] );
        $linkedin = apply_filters( 'mikos_linkedin', $instance['linkedin'] );
        $google = apply_filters( 'mikos_google', $instance['google'] );
        $pinterest = apply_filters( 'mikos_pinterest', $instance['pinterest'] );
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
        ?>
        <div class="connect">
        <div class="social_icons">
        <ul>
        <?php if ( ! empty( $dribble ) ){ ?>
            <li class="dribbble"><a href="<?php echo esc_url($dribble); ?>" class="fa fa-dribbble"></a></li>
        <?php } if ( ! empty( $facebook ) ) { ?>
            <li class="facebook"><a href="<?php echo esc_url($facebook); ?>" class="fa fa-facebook"></a></li>
        <?php } if ( ! empty( $twitter ) ) { ?>
            <li class="twitter"><a href="<?php echo esc_url($twitter); ?>" class="fa fa-twitter"></a></li>
        <?php } if ( ! empty( $linkedin ) ) { ?>
            <li class="linkedin"><a href="<?php echo esc_url($linkedin); ?>" class="fa fa-linkedin"></a></li>
        <?php } if ( ! empty( $pinterest ) ) { ?>
            <li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>" class="fa fa-pinterest"></a></li>
        <?php } if ( ! empty( $google ) ) { ?>
            <li class="googleplus"><a href="<?php echo esc_url($google); ?>" class="fa fa-google"></a></li>
            <?php } ?>
        </ul>
        </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "Follow Us";
        }
        if ( isset( $instance[ 'facebook' ] ) ) {
            $facebook = $instance[ 'facebook' ];
        } else {
            $facebook = "#";
        }
        if ( isset( $instance[ 'dribble' ] ) ) {
            $dribble = $instance[ 'dribble' ];
        } else {
            $dribble = "#";
        }
        if ( isset( $instance[ 'twitter' ] ) ) {
            $twitter = $instance[ 'twitter' ];
        } else {
            $twitter = "#";
        }
        if ( isset( $instance[ 'linkedin' ] ) ) {
            $linkedin = $instance[ 'linkedin' ];
        } else {
            $linkedin = "#";
        }
        if ( isset( $instance[ 'pinterest' ] ) ) {
            $pinterest = $instance[ 'pinterest' ];
        } else {
            $pinterest = "#";
        }
        if ( isset( $instance[ 'google' ] ) ) {
            $google = $instance[ 'google' ];
        } else {
            $google = "#";
        }
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php esc_html_e( 'Facebook:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'dribble' ); ?>"><?php esc_html_e( 'Dribble:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'dribble' ); ?>" name="<?php echo $this->get_field_name( 'dribble' ); ?>" type="text" value="<?php echo esc_attr( $dribble ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php esc_html_e( 'Twitter:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php esc_html_e( 'Linkedin:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php esc_html_e( 'Pinterest:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php esc_html_e( 'Google +:','mikos' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>" />
        </p>
    <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['dribble'] = ( ! empty( $new_instance['dribble'] ) ) ? strip_tags( $new_instance['dribble'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        $instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
        $instance['google'] = ( ! empty( $new_instance['google'] ) ) ? strip_tags( $new_instance['google'] ) : '';
        return $instance;
    }
} // Class mikos_popular_posts_widget ends here
// Register and load the widget
function mikos_social_load_widget() {
    register_widget( 'mikos_social_widget' );
}
add_action( 'widgets_init', 'mikos_social_load_widget' );
?>
