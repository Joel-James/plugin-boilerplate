<?php

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Provide a settings area view for the plugin
 *
 * @link   https://duckdev.com
 * @since  1.0.0
 *
 * @author Joel James <me@joelsays.com>
 */
?>
<?php ddb_render_admin_menu( $tabs, $tab ); // Render admin menu. ?>
<form method="post" action="options.php"></form>
