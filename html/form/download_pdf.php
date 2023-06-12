<?php
session_start();
ob_clean();
require('../vendor/autoload.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();
$pdf->writeHTMLCell(0, 0, '', '', $_SESSION['pdf_html'], 0, 1, 0, true, '', true);
$pdf->Output('test.pdf', 'I');
