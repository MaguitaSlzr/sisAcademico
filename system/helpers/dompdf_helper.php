<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $stream=TRUE) {
	require_once("dompdf-master/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	$dompdf->set_paper('A4', 'portrait');
    $dompdf->load_html($html);
    $dompdf->render();
	$dompdf->stream('FicheroEjemplo.pdf',array('Attachment'=>0));
}