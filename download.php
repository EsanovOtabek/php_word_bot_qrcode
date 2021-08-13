<?php 
if(!empty($_GET['file'])){
	$file=$_GET['file'];

	$pdfname="arizalar/ariza/".$file."/ariza.pdf";
	if(file_exists($pdfname)){
		header('Content-Type: application/pdf');
		header("Content-Transfer-Encoding: Binary");
		header("Content-Disposition: attachment; filename=$pdfname");
		readfile($pdfname);
	}
}
header("location: index.php")
?>