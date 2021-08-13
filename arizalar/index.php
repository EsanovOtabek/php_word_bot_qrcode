<?php

require_once "../vendor/autoload.php";

$t=date("Y_m_d_").time();

// qrcode generatsiya qilish-------------------------
function qrcodepng($value='')
{
	require_once "../phpqrcode/qrlib.php";
	QRcode::png("Esanov Otabek", "qr.png", "H", 6);
	// code...
}



// php word bilan ishlash----------------------------

$document = new \PhpOffice\PhpWord\TemplateProcessor('ariza.docx');

$document->setValue('name',"Esanov Otabek");
$document->setValue('date',date("d.m.Y"));
$document->setImageValue('qrcode',"qr.png");

$name=$t.'.docx';
$document->saveAs($name);

// wordni pdfga aylantirish-------------------------
$pdfname=$t.".pdf";

$path ="../vendor/dompdf/dompdf";

\PhpOffice\PhpWord\Settings::setPdfRendererPath($path);
\PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF);

//Load temp file
$phpWord = \PhpOffice\PhpWord\IOFactory::load($name); 

//Save it
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
$xmlWriter->save($pdfname);



// faylni yuklash------------------------------------
sleep(3);

header('Content-Type: application/pdf');
header("Content-Transfer-Encoding: Binary");
header("Content-Disposition: attachment; filename=$pdfname");
readfile($pdfname);
