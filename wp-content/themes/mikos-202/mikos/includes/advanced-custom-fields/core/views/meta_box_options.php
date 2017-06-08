<?php
/*
*  Meta box - options
*
*  This template file is used when editing a field group and creates the interface for editing options.
*
*  @type	template
*  @date	23/06/12
*/
// global
global $post;
	
// vars
$options = apply_filters('acf/field_group/get_options', array(), $post->ID);
	
?>
<table class="acf_input widefat" id="acf_options">
	<tr>
		<td class="label">
			<label for=""><?php esc_html_e("Order No.",'mikos'); ?></label>
			<p class="description"><?php esc_html_e("Field groups are created in order <br />from lowest to highest",'mikos'); ?></p>
		</td>
		<td>
			<?php 
			
			do_action('acf/create_field', array(
				'type'	=>	'number',
				'name'	=>	'menu_order',
				'value'	=>	$post->menu_order,
			));
			
			?>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for=""><?php esc_html_e("Position",'mikos'); ?></label>
		</td>
		<td>
			<?php 
			
			do_action('acf/create_field', array(
				'type'	=>	'select',
				'name'	=>	'options[position]',
				'value'	=>	$options['position'],
				'choices' => array(
					'acf_after_title'	=>	esc_html__("High (after title)",'mikos'),
					'normal'			=>	esc_html__("Normal (after content)",'mikos'),
					'side'				=>	esc_html__("Side",'mikos'),
				),
				'default_value' => 'normal'
			));
			?>
		</td>
	</tr>
	<tr>
		<td class="label">
			<label for="post_type"><?php esc_html_e("Style",'mikos'); ?></label>
		</td>
		<td>
			<?php 
			
			do_action('acf/create_field', array(
				'type'	=>	'select',
				'name'	=>	'options[layout]',
				'value'	=>	$options['layout'],
				'choices' => array(
					'no_box'			=>	esc_html__("Seamless (no metabox)",'mikos'),
					'default'			=>	esc_html__("Standard (WP metabox)",'mikos'),
				)
			));
			
			?>
		</td>
	</tr>
	<tr id="hide-on-screen">
		<td class="label">
			<label for="post_type"><?php esc_html_e("Hide on screen",'mikos'); ?></label>
			<p class="description"><?php esc_html_e("<b>Select</b> items to <b>hide</b> them from the edit screen",'mikos'); ?></p>
			<p class="description"><?php esc_html_e("If multiple field groups appear on an edit screen, the first field group's options will be used. (the one with the lowest order number)",'mikos'); ?></p>
		</td>
		<td>
			<?php 
			
			do_action('acf/create_field', array(
				'type'	=>	'checkbox',
				'name'	=>	'options[hide_on_screen]',
				'value'	=>	$options['hide_on_screen'],
				'choices' => array(
					'permalink'			=>	esc_html__("Permalink", 'mikos'),
					'the_content'		=>	esc_html__("Content Editor",'mikos'),
					'excerpt'			=>	esc_html__("Excerpt", 'mikos'),
					'custom_fields'		=>	esc_html__("Custom Fields", 'mikos'),
					'discussion'		=>	esc_html__("Discussion", 'mikos'),
					'comments'			=>	esc_html__("Comments", 'mikos'),
					'revisions'			=>	esc_html__("Revisions", 'mikos'),
					'slug'				=>	esc_html__("Slug", 'mikos'),
					'author'			=>	esc_html__("Author", 'mikos'),
					'format'			=>	esc_html__("Format", 'mikos'),
					'featured_image'	=>	esc_html__("Featured Image", 'mikos'),
					'categories'		=>	esc_html__("Categories", 'mikos'),
					'tags'				=>	esc_html__("Tags", 'mikos'),
					'send-trackbacks'	=>	esc_html__("Send Trackbacks", 'mikos'),
				)
			));
			
			?>
		</td>
	</tr>
</table>