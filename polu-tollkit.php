<?php
/*
	Plugin Name: Polu Toolkit
*/

// Test ShortCode

function polu_alert_shortcode($atts, $content = null) {
	extract(shortcode_atts(
	 array(
	 	'type' => 'success'
	 	), 
	 $atts, 'alert' 
	));
	return '<div class="alert alert-'.esc_attr($type).'" role="alert">'.$content.'</div>';
}
add_shortcode( 'alert', 'polu_alert_shortcode' );

function polu_glyphicons_shortcode($atts, $content = null) {
	extract(shortcode_atts( 
		array(
			'icon' => 'glyphicon glyphicon-asterisk'
		), $atts 
	));
	return '<span class="'.esc_attr($icon).'" aria-hidden="true"></span>';
}
add_shortcode( 'glyphicons', 'polu_glyphicons_shortcode' );

function polu_label_shortcode($atts, $content = null) {
	extract(shortcode_atts( 
		array(
			'label_class' 	=> 'default'
		), $atts
	));
	return '<span class="label label-'.$label_class.'">'.$content.'</span>';
}
add_shortcode( 'label', 'polu_label_shortcode' );

function polu_progress_bar_shortcode($atts, $content = null) {
	extract(shortcode_atts( 
		array(
			'complete'	=> '20'
		), $atts, 'progress' ));
	if ($complete <= 20) {
		$label = 'info';
	} elseif ($complete <= 40) {
		$label = 'success';
	} elseif ($complete <= 60) {
		$label = 'warning';
	} elseif ($complete <= 100) {
		$label = 'danger';
	} else {
		$label = 'info';
	}
	return '
	<div class="progress">
	  <div class="progress-bar progress-bar-'.$label.' progress-bar-striped active" role="progressbar" aria-valuenow="'.$complete.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$complete.'%">
	    <span class="sr-only">'.$complete.'% Complete</span>
	  </div>
	</div>
	';
}
add_shortcode( 'progress', 'polu_progress_bar_shortcode' );

function polu_image_shortcode($atts, $content = null) {
	extract(shortcode_atts( 
		array(
			'id'	=> '47',
			'size'	=>	'small'
		), $atts));
	$img_array = wp_get_attachment_image( '47', 'small' );
	return $img_array;
	
}
add_shortcode( 'image', 'polu_image_shortcode' );