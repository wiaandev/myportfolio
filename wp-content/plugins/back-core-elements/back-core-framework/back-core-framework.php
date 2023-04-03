<?php
$dir = plugin_dir_path( __FILE__ );
//For team
require_once $dir .'/metaboxes/page-header.php';
require_once $dir .'/metaboxes/back-functions.php';
require_once $dir .'/metaboxes/cmb2/init.php';
require_once $dir .'/metaboxes/cmb2/cmb2-tabs.php';

/**
 * Implement widgets
 */
require_once $dir . '/inc/widgets/post_recent_widget.php';
require_once $dir . '/inc/widgets/back_contact.php';
require_once $dir . '/inc/widgets/back_information.php';
require_once $dir . '/inc/widgets/social-icon.php';