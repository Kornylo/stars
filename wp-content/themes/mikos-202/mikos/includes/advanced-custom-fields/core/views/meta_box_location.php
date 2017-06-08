<?php
/*
*  Meta box - locations
*
*  This template file is used when editing a field group and creates the interface for editing location rules.
*
*  @type	template
*  @date	23/06/12
*/
// global
global $post;
		
		
// vars
$groups = apply_filters('acf/field_group/get_location', array(), $post->ID);
// at lease 1 location rule
if( empty($groups) )
{
	$groups = array(
		
		// group_0
		array(
			
			// rule_0
			array(
				'param'		=>	'post_type',
				'operator'	=>	'==',
				'value'		=>	'post',
				'order_no'	=>	0,
				'group_no'	=>	0
			)
		)
		
	);
}
?>
<table class="acf_input widefat" id="acf_location">
	<tbody>
	<tr>
		<td class="label">
			<label for="post_type"><?php esc_html_e("Rules",'mikos'); ?></label>
			<p class="description"><?php esc_html_e("Create a set of rules to determine which edit screens will use these advanced custom fields",'mikos'); ?></p>
		</td>
		<td>
			<div class="location-groups">
				
<?php if( is_array($groups) ): ?>
	<?php foreach( $groups as $group_id => $group ): 
		$group_id = 'group_' . $group_id;
		?>
		<div class="location-group" data-id="<?php echo $group_id; ?>">
			<?php if( $group_id == 'group_0' ): ?>
				<h4><?php esc_html_e("Show this field group if",'mikos'); ?></h4>
			<?php else: ?>
				<h4><?php esc_html_e("or",'mikos'); ?></h4>
			<?php endif; ?>
			<?php if( is_array($group) ): ?>
			<table class="acf_input widefat">
				<tbody>
					<?php foreach( $group as $rule_id => $rule ): 
						$rule_id = 'rule_' . $rule_id;
					?>
					<tr data-id="<?php echo $rule_id; ?>">
					<td class="param"><?php 
						
						$choices = array(
							esc_html__("Basic",'mikos') => array(
								'post_type'		=>	esc_html__("Post Type",'mikos'),
								'user_type'		=>	esc_html__("Logged in User Type",'mikos'),
							),
							esc_html__("Post",'mikos') => array(
								'post'			=>	esc_html__("Post",'mikos'),
								'post_category'	=>	esc_html__("Post Category",'mikos'),
								'post_format'	=>	esc_html__("Post Format",'mikos'),
								'post_status'	=>	esc_html__("Post Status",'mikos'),
								'taxonomy'		=>	esc_html__("Post Taxonomy",'mikos'),
							),
							esc_html__("Page",'mikos') => array(
								'page'			=>	esc_html__("Page",'mikos'),
								'page_type'		=>	esc_html__("Page Type",'mikos'),
								'page_parent'	=>	esc_html__("Page Parent",'mikos'),
								'page_template'	=>	esc_html__("Page Template",'mikos'),
							),
							esc_html__("Other",'mikos') => array(
								'ef_media'		=>	esc_html__("Attachment",'mikos'),
								'ef_taxonomy'	=>	esc_html__("Taxonomy Term",'mikos'),
								'ef_user'		=>	esc_html__("User",'mikos'),
							)
						);
								
						
						// allow custom location rules
						$choices = apply_filters( 'acf/location/rule_types', $choices );
						
						
						// create field
						$args = array(
							'type'	=>	'select',
							'name'	=>	'location[' . $group_id . '][' . $rule_id . '][param]',
							'value'	=>	$rule['param'],
							'choices' => $choices,
						);
						
						do_action('acf/create_field', $args);							
						
					?></td>
					<td class="operator"><?php 	
						
						$choices = array(
							'=='	=>	esc_html__("is equal to",'mikos'),
							'!='	=>	esc_html__("is not equal to",'mikos'),
						);
						
						
						// allow custom location rules
						$choices = apply_filters( 'acf/location/rule_operators', $choices );
						
						
						// create field
						do_action('acf/create_field', array(
							'type'	=>	'select',
							'name'	=>	'location[' . $group_id . '][' . $rule_id . '][operator]',
							'value'	=>	$rule['operator'],
							'choices' => $choices
						)); 	
						
					?></td>
					<td class="value"><?php 
						
						$this->ajax_render_location(array(
							'group_id' => $group_id,
							'rule_id' => $rule_id,
							'value' => $rule['value'],
							'param' => $rule['param'],
						)); 
						
					?></td>
					<td class="add">
						<a href="#" class="location-add-rule button"><?php esc_html_e("and",'mikos'); ?></a>
					</td>
					<td class="remove">
						<a href="#" class="location-remove-rule acf-button-remove"></a>
					</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	
	<h4><?php esc_html_e("or",'mikos'); ?></h4>
	
	<a class="button location-add-group" href="#"><?php esc_html_e("Add rule group",'mikos'); ?></a>
	
<?php endif; ?>
				
			</div>
		</td>
	</tr>
	</tbody>
</table>