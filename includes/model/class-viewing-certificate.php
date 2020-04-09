<?php
/**
 * Viewing_Certificate class
 *
 * @package PDF Playground
 * @subpackage Classes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Viewing_Certificate class definition.
 *
 * @since 1.0.0
 */
class Viewing_Certificate {

	const HEIGHT = 17;
	const MULTI_LINE = 6;
	const WIDTH = 175;
	const TEXT_HORIZONTAL_POSITION = 0;
	const BORDER = 0;
	const LINE_POSITION = 2;
	const TEXT_ALIGN = 'C';

	/**
	 * The user display name.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $display_name;

	/**
	 * The website link.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $link;

	/**
	 * The date now.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $date;

	/**
	 * This isn't the method you're looking for.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {}

	/**
	 * Create a viewing certificate.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param PDF_HTML $pdf_html The viewing certificate
	 * @return PDF_HTML
	 */
	public function create( PDF_HTML $pdf_html ) {
		$pdf_html->AddFont(
			'Helvetica Neue',
			'',
			'helveticaneue.ttf',
			true
		);
		$pdf_html->AddFont(
			'Helvetica Neue',
			'B',
			'helveticaneueb.ttf',
			true
		);
		$pdf_html->AddFont(
			'Helvetica Neue',
			'I',
			'helveticaneuei.ttf',
			true
		);
		$pdf_html->AddPage(
			'L'
		);
		$pdf_html->setSourceFile(
			plugin_dir_path( __FILE__ ) . '../../assets/certificate.pdf'
		);
		$tplIdx = $pdf_html->importPage(
			1
		);
		$pdf_html->useTemplate(
			$tplIdx,
			0,
			0,
			297
		);
		$pdf_html->SetMargins(
			61,
			0
		);
		$pdf_html->SetAuthor(
			__( 'Diane Wallace', 'pdf-playground' )
		);
		$pdf_html->SetTitle(
			sprintf(
				__( 'Certificate of Excellence for %s', 'pdf-playground' ),
				$this->display_name
			)
		);
		$pdf_html->SetSubject(
			sprintf(
				__( 'Certificate of Excellence in %s', 'pdf-playground' ),
				$this->title
			)
		);
		$pdf_html->SetFont(
			'Helvetica Neue',
			'B',
			32
		);
		$pdf_html->SetTextColor(
			77,
			77,
			77
		);
		$pdf_html->SetXY(
			self::TEXT_HORIZONTAL_POSITION,
			53
		);
		$pdf_html->WriteHTML(
			'<p>'
		);
		$pdf_html->Cell(
			self::WIDTH,
			self::HEIGHT,
			sprintf(
				'%s',
				$this->title
			),
			self::BORDER,
			self::LINE_POSITION,
			self::TEXT_ALIGN
		);
		$pdf_html->WriteHTML(
			'</p>'
		);
		$pdf_html->SetLeftMargin(
			61
		);
		$pdf_html->SetFont(
			'Helvetica Neue',
			'B',
			24
		);
		$pdf_html->SetXY(
			self::TEXT_HORIZONTAL_POSITION,
			85
		);
		$pdf_html->WriteHTML(
			'<p>'
		);
		$pdf_html->MultiCell(
			self::WIDTH,
			Self::MULTI_LINE,
			sprintf(
				'%s',
				$this->presented
			),
			self::BORDER,
			self::TEXT_ALIGN,
			0
		);
		$pdf_html->WriteHTML(
			'</p>'
		);
		$pdf_html->SetFont(
			'Helvetica Neue',
			'B',
			34
		);
		$pdf_html->SetXY(
			self::TEXT_HORIZONTAL_POSITION,
			110
		);
		$pdf_html->WriteHTML(
			'<p>'
		);
		$pdf_html->MultiCell(
			self::WIDTH,
			Self::MULTI_LINE,
			sprintf(
				'%s',
				$this->display_name
			),
			self::BORDER,
			self::TEXT_ALIGN,
			0
		);
		$pdf_html->WriteHTML(
			'</p>'
		);
		$pdf_html->SetFont(
			'Helvetica Neue',
			'',
			11
		);
		$pdf_html->SetXY(
			60,
			160
		);
		$pdf_html->WriteHTML(
			'<span>'
		);
		$pdf_html->Cell(
			100,
			4,
			$this->date,
			self::BORDER,
			self::LINE_POSITION,
			self::TEXT_ALIGN,
			false
		);
		$pdf_html->WriteHTML(
			'</span>'
		);
		$pdf_html->SetFont(
			'Helvetica Neue',
			'',
			11
		);
		$pdf_html->SetXY(
			135,
			160
		);
		$pdf_html->WriteHTML(
			'<span>'
		);
		$pdf_html->Cell(
			100,
			4,
			$this->link,
			self::BORDER,
			self::LINE_POSITION,
			self::TEXT_ALIGN,
			false,
			$this->link
		);
		$pdf_html->WriteHTML(
			'</span>'
		);
		return $pdf_html;
	}
}
