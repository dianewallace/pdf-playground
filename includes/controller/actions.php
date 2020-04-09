<?php
/**
 * Action hooks
 *
 * @package PDF Playground
 * @subpackage Actions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'template_redirect', 'pdf_playground' );
