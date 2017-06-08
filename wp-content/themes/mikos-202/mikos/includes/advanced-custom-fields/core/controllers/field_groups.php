<?php
/*
*  acf_field_groups
*
*  @description:
*  @since: 3.6
*  @created: 25/01/13
*/


// Vars

$url_field_type = 'www.advancedcustomfields.com/docs/tutorials/creating-a-new-field-type/';
$url_migrating = 'www.advancedcustomfields.com/resources/getting-started/migrating-from-v3-to-v4/';

class acf_field_groups
{
	/*
	*  __construct
	*
	*  @description:
	*  @since 3.1.8
	*  @created: 23/06/12
	*/

	function __construct()
	{
		// actions
		add_action('admin_menu', array($this,'admin_menu'));
	}


	/*
	*  admin_menu
	*
	*  @description:
	*  @created: 2/08/12
	*/

	function admin_menu()
	{

		// validate page
		if( ! $this->validate_page() )
		{
			return;
		}


		// actions
		add_action('admin_print_scripts', array($this,'admin_print_scripts'));
		add_action('admin_print_styles', array($this,'admin_print_styles'));
		add_action('admin_footer', array($this,'admin_footer'));


		// columns
		add_filter( 'manage_edit-acf_columns', array($this,'acf_edit_columns'), 10, 1 );
		add_action( 'manage_acf_posts_custom_column' , array($this,'acf_columns_display'), 10, 2 );

	}


	/*
	*  validate_page
	*
	*  @description: returns true | false. Used to stop a function from continuing
	*  @since 3.2.6
	*  @created: 23/06/12
	*/

	function validate_page()
	{
		// global
		global $pagenow;


		// vars
		$return = false;


		// validate page
		if( in_array( $pagenow, array('edit.php') ) )
		{

			// validate post type
			if( isset($_GET['post_type']) && $_GET['post_type'] == 'acf' )
			{
				$return = true;
			}


			if( isset($_GET['page']) )
			{
				$return = false;
			}

		}


		// return
		return $return;
	}


	/*
	*  admin_print_scripts
	*
	*  @description:
	*  @since 3.1.8
	*  @created: 23/06/12
	*/

	function admin_print_scripts()
	{
		wp_enqueue_script(array(
			'jquery',
			'thickbox',
		));
	}


	/*
	*  admin_print_styles
	*
	*  @description:
	*  @since 3.1.8
	*  @created: 23/06/12
	*/

	function admin_print_styles()
	{
		wp_enqueue_style(array(
			'thickbox',
			'acf-global',
			'acf',
		));
	}


	/*
	*  acf_edit_columns
	*
	*  @description:
	*  @created: 2/08/12
	*/

	function acf_edit_columns( $columns )
	{
		$columns = array(
			'cb'	 	=> '<input type="checkbox" />',
			'title' 	=> esc_html__("Title",'mikos'),
			'fields' 	=> esc_html__("Fields", 'mikos')
		);

		return $columns;
	}


	/*
	*  acf_columns_display
	*
	*  @description:
	*  @created: 2/08/12
	*/

	function acf_columns_display( $column, $post_id )
	{
		// vars
		switch ($column)
	    {
	        case "fields":

	            // vars
				$count =0;
				$keys = get_post_custom_keys( $post_id );

				if($keys)
				{
					foreach($keys as $key)
					{
						if(strpos($key, 'field_') !== false)
						{
							$count++;
						}
					}
			 	}

			 	echo $count;
	            break;
	    }
	}


	/*
	*  admin_footer
	*
	*  @description:
	*  @since 3.1.8
	*  @created: 23/06/12
	*/

	function admin_footer()
	{
		// vars
		$version = apply_filters('acf/get_info', 'version');
		$dir = apply_filters('acf/get_info', 'dir');
		$path = apply_filters('acf/get_info', 'path');
		$show_tab = isset($_GET['info']);
		$tab = isset($_GET['info']) ? $_GET['info'] : 'changelog';

		?>
<script type="text/html" id="tmpl-acf-col-right">
<div id="acf-col-right">
	<div class="wp-box">
		<div class="inner">
			<h2><?php esc_html_e("Advanced Custom Fields",'mikos'); ?> <?php echo $version; ?></h2>
			<h3><?php esc_html_e("Changelog",'mikos'); ?></h3>
			<p><?php esc_html_e("See what's new in",'mikos'); ?> <a href="<?php echo admin_url('edit.php?post_type=acf&info=changelog'); ?>"><?php esc_html_e("version",'mikos'); ?> <?php echo $version; ?></a>`

			<h3><?php esc_html_e("Resources",'mikos'); ?></h3>
			<ul>
				<li><a href="http://www.advancedcustomfields.com/resources/#getting-started" target="_blank"><?php esc_html_e("Getting Started",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#field-types" target="_blank"><?php esc_html_e("Field Types",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#functions" target="_blank"><?php esc_html_e("Functions",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#actions" target="_blank"><?php esc_html_e("Actions",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#filters" target="_blank"><?php esc_html_e("Filters",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#how-to" target="_blank"><?php esc_html_e("'How to' guides",'mikos'); ?></a></li>
				<li><a href="http://www.advancedcustomfields.com/resources/#tutorials" target="_blank"><?php esc_html_e("Tutorials",'mikos'); ?></a></li>
			</ul>
		</div>
		<div class="footer footer-blue">
			<ul class="hl">
				<li><?php esc_html_e("Created by",'mikos'); ?> Elliot Condon</li>
			</ul>
		</div>
	</div>
</div>
</script>
<script type="text/html" id="tmpl-acf-about">
<!-- acf-about -->
<div id="acf-about" class="acf-content">

	<!-- acf-content-title -->
	<div class="acf-content-title">
		<h1><?php esc_html_e("Welcome to Advanced Custom Fields",'mikos'); ?> <?php echo $version; ?></h1>
		<h2><?php esc_html_e("Thank you for updating to the latest version!",'mikos'); ?> <br />ACF <?php echo $version; ?> <?php esc_html_e("is more polished and enjoyable than ever before. We hope you like it.",'mikos'); ?></h2>
	</div>
	<!-- / acf-content-title -->

	<!-- acf-content-body -->
	<div class="acf-content-body">
		<h2 class="nav-tab-wrapper">
			<a class="acf-tab-toggle nav-tab <?php if( $tab == 'whats-new' ){ echo 'nav-tab-active'; } ?>" href="<?php echo admin_url('edit.php?post_type=acf&info=whats-new'); ?>"><?php esc_html_e("What&#8242;s New",'mikos'); ?></a>
			<a class="acf-tab-toggle nav-tab <?php if( $tab == 'changelog' ){ echo 'nav-tab-active'; } ?>" href="<?php echo admin_url('edit.php?post_type=acf&info=changelog'); ?>"><?php esc_html_e("Changelog",'mikos'); ?></a>
			<?php if( $tab == 'download-add-ons' ): ?>
			<a class="acf-tab-toggle nav-tab nav-tab-active" href="<?php echo admin_url('edit.php?post_type=acf&info=download-add-ons'); ?>"><?php esc_html_e("Download Add-ons",'mikos'); ?></a>
			<?php endif; ?>
		</h2>
<?php if( $tab == 'whats-new' ):

		$activation_codes = array(
			'repeater' => get_option('acf_repeater_ac', ''),
			'gallery' => get_option('acf_gallery_ac', ''),
			'options_page' => get_option('acf_options_page_ac', ''),
			'flexible_content' => get_option('acf_flexible_content_ac', '')
		);

		$active = array(
			'repeater' => class_exists('acf_field_repeater'),
			'gallery' => class_exists('acf_field_gallery'),
			'options_page' => class_exists('acf_options_page_plugin'),
			'flexible_content' => class_exists('acf_field_flexible_content')
		);

		$update_required = false;
		$update_complete = true;

		foreach( $activation_codes as $k => $v )
		{
			if( $v )
			{
				$update_required = true;

				if( !$active[ $k ] )
				{
					$update_complete = false;
				}
			}
		}


		?>
		<table id="acf-add-ons-table" class="alignright">
			<tr>
				<td><img src="<?php echo $dir; ?>images/add-ons/repeater-field-thumb.jpg" /></td>
				<td><img src="<?php echo $dir; ?>images/add-ons/gallery-field-thumb.jpg" /></td>
			</tr>
			<tr>
				<td><img src="<?php echo $dir; ?>images/add-ons/options-page-thumb.jpg" /></td>
				<td><img src="<?php echo $dir; ?>images/add-ons/flexible-content-field-thumb.jpg" /></td>
			</tr>
		</table>

		<div style="margin-right: 300px;">

			<h3><?php esc_html_e("Add-ons",'mikos'); ?></h3>

			<h4><?php esc_html_e("Activation codes have grown into plugins!",'mikos'); ?></h4>
			<p><?php esc_html_e("Add-ons are now activated by downloading and installing individual plugins. Although these plugins will not be hosted on the wordpress.org repository, each Add-on will continue to receive updates in the usual way.",'mikos'); ?></p>


			<?php if( $update_required ): ?>
				<?php if( $update_complete ): ?>
				<div class="acf-alert acf-alert-success">
					<p><?php esc_html_e("All previous Add-ons have been successfully installed",'mikos'); ?></p>
				</div>
				<?php else: ?>
				<div class="acf-alert acf-alert-success">
					<p><?php esc_html_e("This website uses premium Add-ons which need to be downloaded",'mikos'); ?> <a href="<?php echo admin_url('edit.php?post_type=acf&info=download-add-ons'); ?>" class="acf-button" style="display: inline-block;"><?php esc_html_e("Download your activated Add-ons",'mikos'); ?></a></p>
				</div>
				<?php endif; ?>
			<?php else: ?>
			<div class="acf-alert acf-alert-success">
				<p><?php esc_html_e("This website does not use premium Add-ons and will not be affected by this change.",'mikos'); ?></p>
			</div>
			<?php endif; ?>

		</div>

		<div class="clear"></div>

		<hr />

		<h3><?php esc_html_e("Easier Development",'mikos'); ?></h3>

		<h4><?php esc_html_e("New Field Types",'mikos'); ?></h4>
		<ul>
			<li><?php esc_html_e("Taxonomy Field",'mikos'); ?></li>
			<li><?php esc_html_e("User Field",'mikos'); ?></li>
			<li><?php esc_html_e("Email Field",'mikos'); ?></li>
			<li><?php esc_html_e("Password Field",'mikos'); ?></li>
		</ul>
		<h4><?php esc_html_e("Custom Field Types",'mikos'); ?></h4>
		<p><?php esc_html_e("Creating your own field type has never been easier! Unfortunately, version 3 field types are not compatible with version 4.",'mikos'); ?><br />
		<?php esc_html_e("Migrating your field types is easy, please",'mikos'); ?> <a href="<?php esc_url( $url_field_type ); ?>" target="_blank"><?php esc_html_e("follow this tutorial",'mikos'); ?></a> <?php esc_html_e("to learn more.",'mikos'); ?></p>

		<h4><?php esc_html_e("Actions &amp; Filters",'mikos'); ?></h4>
		<p><?php esc_html_e("All actions & filters have received a major facelift to make customizing ACF even easier! Please",'mikos'); ?> <a href="<?php esc_url( $url_migrating ); ?>" target="_blank"><?php esc_html_e("read this guide",'mikos'); ?></a> <?php esc_html_e("to find the updated naming convention.",'mikos'); ?></p>

		<h4><?php esc_html_e("Preview draft is now working!",'mikos'); ?></h4>
		<p><?php esc_html_e("This bug has been squashed along with many other little critters!",'mikos'); ?> <a class="acf-tab-toggle" href="<?php echo admin_url('edit.php?post_type=acf&info=changelog'); ?>" data-tab="2"><?php esc_html_e("See the full changelog",'mikos'); ?></a></p>

		<hr />

		<h3><?php esc_html_e("Important",'mikos'); ?></h3>

		<h4><?php esc_html_e("Database Changes",'mikos'); ?></h4>
		<p><?php esc_html_e("Absolutely <strong>no</strong> changes have been made to the database between versions 3 and 4. This means you can roll back to version 3 without any issues.",'mikos'); ?></p>

		<h4><?php esc_html_e("Potential Issues",'mikos'); ?></h4>
		<p><?php esc_html_e("Do to the sizable changes surounding Add-ons, field types and action/filters, your website may not operate correctly. It is important that you read the full",'mikos'); ?> <a href="<?php esc_url( $url_migrating ); ?>" target="_blank"><?php esc_html_e("Migrating from v3 to v4",'mikos'); ?></a> <?php esc_html_e("guide to view the full list of changes.",'mikos'); ?></p>

		<div class="acf-alert acf-alert-error">
			<p><strong><?php esc_html_e("Really Important!",'mikos'); ?></strong> <?php esc_html_e("If you updated the ACF plugin without prior knowledge of such changes, please roll back to the latest",'mikos'); ?> <a href="http://wordpress.org/extend/plugins/advanced-custom-fields/developers/"><?php esc_html_e("version 3",'mikos'); ?></a> <?php esc_html_e("of this plugin.",'mikos'); ?></p>
		</div>

		<hr />

		<h3><?php esc_html_e("Thank You",'mikos'); ?></h3>
		<p><?php esc_html_e("A <strong>BIG</strong> thank you to everyone who has helped test the version 4 beta and for all the support I have received.",'mikos'); ?></p>
		<p><?php esc_html_e("Without you all, this release would not have been possible!",'mikos'); ?></p>
<?php elseif( $tab == 'changelog' ): ?>

		<h3><?php esc_html_e("Changelog for",'mikos'); ?> <?php echo $version; ?></h3>
		<?php
		/*
		$items = file_get_contents( $path . 'readme.txt' );
		$items = explode('= ' . $version . ' =', $items);

		$items = end( $items );
		$items = current( explode("\n\n", $items) );
		$items = array_filter( array_map('trim', explode("*", $items)) );
		*/
		?>
		<ul class="acf-changelog">
		<?php foreach( $items as $item ):

			$item = explode('http', $item);

		?>
			<li><?php echo $item[0]; ?><?php if( isset($item[1]) ): ?><a href="http<?php echo $item[1]; ?>" target="_blank"><?php esc_html_e("Learn more",'mikos'); ?></a><?php endif; ?></li>
		<?php endforeach; ?>
		</ul>
<?php elseif( $tab == 'download-add-ons' ): ?>

		<h3><?php esc_html_e("Overview",'mikos'); ?></h3>

		<p><?php esc_html_e("Previously, all Add-ons were unlocked via an activation code (purchased from the ACF Add-ons store). New to v4, all Add-ons act as separate plugins which need to be individually downloaded, installed and updated.",'mikos'); ?></p>

		<p><?php esc_html_e("This page will assist you in downloading and installing each available Add-on.",'mikos'); ?></p>

		<h3><?php esc_html_e("Available Add-ons",'mikos'); ?></h3>

		<p><?php esc_html_e("The following Add-ons have been detected as activated on this website.",'mikos'); ?></p>

		<?php

		$ac_repeater = get_option('acf_repeater_ac', '');
		$ac_options_page = get_option('acf_options_page_ac', '');
		$ac_flexible_content = get_option('acf_flexible_content_ac', '');
		$ac_gallery = get_option('acf_gallery_ac', '');

		?>
		<table class="widefat" id="acf-download-add-ons-table">
			<thead>
			<tr>
				<th colspan="2"><?php esc_html_e("Name",'mikos'); ?></th>
				<th><?php esc_html_e("Activation Code",'mikos'); ?></th>
				<th><?php esc_html_e("Download",'mikos'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if( $ac_repeater ): ?>
			<tr>
				<td class="td-image"><img src="<?php echo $dir; ?>images/add-ons/repeater-field-thumb.jpg" style="width:50px" /></td>
				<th class="td-name"><?php esc_html_e("Repeater Field",'mikos'); ?></th>
				<td class="td-code">XXXX-XXXX-XXXX-<?php echo substr($ac_repeater,-4); ?></td>
				<td class="td-download"><a class="button" href="http://download.advancedcustomfields.com/<?php echo $ac_repeater; ?>/trunk"><?php esc_html_e("Download",'mikos'); ?></a></td>
			</tr>
			<?php endif; ?>
			<?php if( $ac_gallery ): ?>
			<tr>
				<td><img src="<?php echo $dir; ?>images/add-ons/gallery-field-thumb.jpg" /></td>
				<th><?php esc_html_e("Gallery Field",'mikos'); ?></th>
				<td>XXXX-XXXX-XXXX-<?php echo substr($ac_gallery,-4); ?></td>
				<td><a class="button" href="http://download.advancedcustomfields.com/<?php echo $ac_gallery; ?>/trunk"><?php esc_html_e("Download",'mikos'); ?></a></td>
			</tr>
			<?php endif; ?>
			<?php if( $ac_options_page ): ?>
			<tr>
				<td><img src="<?php echo $dir; ?>images/add-ons/options-page-thumb.jpg" /></td>
				<th><?php esc_html_e("Options Page",'mikos'); ?></th>
				<td>XXXX-XXXX-XXXX-<?php echo substr($ac_options_page,-4); ?></td>
				<td><a class="button" href="http://download.advancedcustomfields.com/<?php echo $ac_options_page; ?>/trunk"><?php esc_html_e("Download",'mikos'); ?></a></td>
			</tr>
			<?php endif; ?>
			<?php if($ac_flexible_content): ?>
			<tr>
				<td><img src="<?php echo $dir; ?>images/add-ons/flexible-content-field-thumb.jpg" /></td>
				<th><?php esc_html_e("Flexible Content",'mikos'); ?></th>
				<td>XXXX-XXXX-XXXX-<?php echo substr($ac_flexible_content,-4); ?></td>
				<td><a class="button" href="http://download.advancedcustomfields.com/<?php echo $ac_flexible_content; ?>/trunk"><?php esc_html_e("Download",'mikos'); ?></a></td>
			</tr>
			<?php endif; ?>
			</tbody>
		</table>



		<h3><?php esc_html_e("Installation",'mikos'); ?></h3>

		<p><?php esc_html_e("For each Add-on available, please perform the following:",'mikos'); ?></p>
		<ol>
			<li><?php esc_html_e("Download the Add-on plugin (.zip file) to your desktop",'mikos'); ?></li>
			<li><?php esc_html_e("Navigate to",'mikos'); ?> <a target="_blank" href="<?php echo admin_url('plugin-install.php?tab=upload'); ?>"><?php esc_html_e("Plugins > Add New > Upload",'mikos'); ?></a></li>
			<li><?php esc_html_e("Use the uploader to browse, select and install your Add-on (.zip file)",'mikos'); ?></li>
			<li><?php esc_html_e("Once the plugin has been uploaded and installed, click the 'Activate Plugin' link",'mikos'); ?></li>
			<li><?php esc_html_e("The Add-on is now installed and activated!",'mikos'); ?></li>
		</ol>


<?php endif; ?>

	</div>
	<!-- / acf-content-body -->


	<!-- acf-content-footer -->
	<div class="acf-content-footer">
		<ul class="hl clearfix">
			<li><a class="acf-button acf-button-big" href="<?php echo admin_url('edit.php?post_type=acf'); ?>"><?php esc_html_e("Awesome. Let's get to work",'mikos'); ?></a></li>
		</ul>
	</div>
	<!-- / acf-content-footer -->



</div>
<!-- / acf-about -->
</script>
<script type="text/javascript">
(function($){

	// wrap
	$('#wpbody .wrap').attr('id', 'acf-field_groups');
	$('#acf-field_groups').wrapInner('<div id="acf-col-left" />');
	$('#acf-field_groups').wrapInner('<div id="acf-cols" />');


	// add sidebar
	$('#acf-cols').prepend( $('#tmpl-acf-col-right').html() );


	// take out h2 + icon
	$('#acf-col-left > .icon32').insertBefore('#acf-cols');
	$('#acf-col-left > h2').insertBefore('#acf-cols');


	<?php if( $show_tab ): ?>
	// add about copy
	$('#wpbody-content').prepend( $('#tmpl-acf-about').html() );
	$('#acf-field_groups').hide();
	$('#screen-meta-links').hide();
	<?php endif; ?>

})(jQuery);
</script>
		<?php
	}

}
new acf_field_groups();
?>
