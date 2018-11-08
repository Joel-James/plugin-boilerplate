<?php

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Provide a admin header view for the plugin
 *
 * @link  https://duckdev.com
 * @since 1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
?>
<div class="wrap">
	<h1><?php echo empty( $title ) ? esc_html__( 'DD Boilerplate', 'dd-boilerplate' ) : $title ?></h1>
	<?php settings_errors(); ?>