<?php
/**
 * Function definitions
 *
 * @package PDF Playground
 * @subpackage Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Process the XMLHttpRequest request.
 *
 * @since 1.0.0
 */
function pdf_playground() {
	// If it's a single post or a single page, with slug 'pdf-playground', show PDF.
	if ( is_single( 'pdf-playground' ) || is_page( 'pdf-playground' ) ) {

		ini_set("display_startup_errors", 1);
		ini_set("display_errors", 1);

		/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
		error_reporting(E_ALL );


		$viewing_certificate = new Viewing_Certificate;

		if ( is_user_logged_in() ) {

			$current_user = wp_get_current_user();

			// Set user data class properties
			$viewing_certificate->display_name   = $current_user->display_name;

		}

		// Format date using WordPress settings.
		$date_format = get_option( 'date_format' );

		// Set website data class properties
		$viewing_certificate->title     = 'Certificate of Excellence!';
		$viewing_certificate->presented = 'Presented to';
		$viewing_certificate->link      = home_url();
		$viewing_certificate->date      = date( $date_format );


		// Create a viewing certificate
		$pdf_html = $viewing_certificate->create( new PDF_HTML() );

		// Set a "200 OK" response code
		http_response_code( 200 );

		// Send the response
		echo $pdf_html->Output( 'doc.pdf', 'I' );
		exit;
	}
}
