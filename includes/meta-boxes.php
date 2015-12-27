<?php

add_filter( 'rwmb_meta_boxes', 'hnm_register_meta_boxes' );

function hnm_register_meta_boxes( $meta_boxes )
{

	$prefix = '';

	$meta_boxes[] = array(
		'id'         => 'page_settings',
		'title'      => __( 'Page Settings', 'health-plus' ),
		'post_types' => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => __( 'Page Layout', 'health-plus' ),
				'desc'  => __( 'Select the layout of this page.', 'health-plus' ),
				'id'    => "{$prefix}page_layout",
				'type'  => 'image_select',
				'std'	=> 'none',
				'options'  => array(
					'left'  => get_template_directory_uri() . '/images/ls.png',
					'right' => get_template_directory_uri() . '/images/rs.png',
					'none'  => get_template_directory_uri() . '/images/fw.png',
				)
			),
			array(
				'name'  => __( 'Page Sub-Title', 'health-plus' ),
				'desc'  => __( 'Enter a Sub-Title for this page. (Optional)', 'health-plus' ),
				'id'    => "{$prefix}page_subtitle",
				'type'  => 'text',
				'std'	=> '',
			)
		)
	);

	$meta_boxes[] = array(
		'id'         => 'banner_settings',
		'title'      => __( 'Banner Settings', 'health-plus' ),
		'post_types' => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => __( 'Banner Options', 'health-plus' ),
				'desc'  => __( 'Select the banner option of this page. e.g. Featured Image as a background or Slider.', 'health-plus' ),
				'id'    => "{$prefix}banner_options",
				'type'  => 'radio',
				'std'	=> 'fimage',
				'options'  => array(
					'fimage'  => 'Featured Image',
					'slider' => 'Slider'
				)
			),
			array(
				'name'  => __( 'Slider Shortcode', 'health-plus' ),
				'desc'  => __( 'Insert Revolution Slider shortcode here. And select Slider as banner option from above.', 'health-plus' ),
				'id'    => "{$prefix}banner_slider",
				'type'  => 'text',
				'std'	=> '',
			)
		)
	);

	$meta_boxes[] = array(
		'id'         => 'doctor_profile',
		'title'      => __( 'Doctor Profile', 'health-plus' ),
		'post_types' => array( 'teams' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => __( 'Designation', 'health-plus' ),
				'id'    => "{$prefix}doc_designation",
				'type'  => 'text',
				'std'	=> '',
			),
			array(
				'name'  => __( 'Time Table', 'health-plus' ),
				'id'    => "{$prefix}doc_timetable",
				'type'  => 'text',
				'desc'	=> __( 'Enter availability time table of this doctor. e.g. Mon to Fri 14:00-16:00', 'health-plus' ),
				'std'	=> '',
			)
		)
	);

	return $meta_boxes;
}