<?php
include_once 'config.php';


if($_POST['submit']){
	require_once "vendor/autoload.php";
	require_once "vendor/convertapi/convertapi-php/lib/ConvertApi/autoload.php";
	require_once "phpqrcode/qrlib.php";
	
	$c=0;
	// post so'rovidagi massivni alohida o'zgaruvchilarga filterlab saqlab olish
	foreach ($_POST as $key => $value) {
		$$key =mysqli_real_escape_string($link, trim($value));
		if(!empty($$key)){
			$c++;
		}
	}

	// har birini bo'sh emasligini tekshirib olamiz
	if($c>=6){
		//har bir yuklanadigan fayllarni alohida papkaga saqlaymiz
		$pathname=date('Y-m-d-').time().trim($tel1,'+');
		$path="arizalar/ariza/".$pathname;
		mkdir($path);

		 // fayl yuklash funksiyasi------------------------------------------------
		function fileUpload($file,$name){
			if ($file['size']<12000000&&$file['error']==0){
				$path=$GLOBALS['path'];
				$tmp=explode('.',$file['name']);
				$fname=$name."-".rand(1,1000).".".$tmp[1];
				$p=$path."/".$fname;
				return move_uploaded_file($file['tmp_name'],$p);
			}
			return false;
		}
		// ------------------------------------------------------------------------

		// butun papkani ziplash---------------------------------------------------
		function zipArchive($rootPath)
		{
			$zip=new ZipArchive();
			$zip->open("arizalar/ariza/zip/".$rootPath.".zip",ZipArchive::CREATE | ZipArchive::OVERWRITE);
			$files=glob("arizalar/ariza/$rootPath/*");
			foreach ($files as $file) {
				$parts=explode("/",$file);
				$zip->addFile($file,$parts[2]."/".$parts[3]);
			}
			return $zip->close();
		}
		// ------------------------------------------------------------------------

		$a=0;
		foreach ($_FILES as $key => $file) {
			if(fileUpload($file,$key)) $a++;
		}

		if($a>=2){
			//sql so'rovni yuborish----------------------------
			$sql="INSERT INTO `ariza`( `fioa`, `fiov`, `adress`, `tel1`, `tel2`, `sinf`, `pathname`) VALUES ('$fioa','$fiov','$adress','$tel1','$tel2','$sinf','$pathname')";
			$res=mysqli_query($link,$sql);

			// qrcode generatsiya qilish-------------------------
			QRcode::png("http://lifepc.uz/".$path."/ariza.pdf", "arizalar/ariza/qrcode/".$pathname.".png", "M", 6);

			// php word bilan ishlash----------------------------

			$document = new \PhpOffice\PhpWord\TemplateProcessor('arizalar/ariza.docx');
			$document->setValue('vasiy_name',trim($_POST['fiov']));
			$document->setValue('name',trim($_POST['fioa']));
			$document->setValue('nth',intval($sinf));
			$document->setValue('date',date("d.m.Y"));
			$document->setImageValue('qrcode',"arizalar/ariza/qrcode/".$pathname.".png");
			$wordname="arizalar/ariza/doc/".$pathname.".docx";
			$document->saveAs($wordname);

			// wordni pdfga aylantirish-------------------------

			\ConvertApi\ConvertApi::setApiSecret('secret-api-key');
			$result = \ConvertApi\ConvertApi::convert('pdf', ['File' => $wordname]);

			$pdfname=$path."/ariza.pdf";
			$result->getFile()->save($pdfname);
			$contents = $result->getFile()->getContents();
			
			/*
			\PhpOffice\PhpWord\Settings::setPdfRendererPath("vendor/dompdf/dompdf");
			\PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF);
			$phpWord = \PhpOffice\PhpWord\IOFactory::load($wordname); 

			$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
			$xmlWriter->save($pdfname);
			*/

			// papkani ziplash ------------
			zipArchive($pathname);
			
			
			// telegram bot bilan ishlash qismi-------------------------------------------------
			define('API_KEY','here-your-bot-token');
			function bot($method,$datas=[]){
			    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
			    $ch = curl_init();
			    curl_setopt($ch,CURLOPT_URL,$url);
			    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
			    $res = curl_exec($ch);
			    if(curl_error($ch)){
			        var_dump(curl_error($ch));
			    }else{
			        return json_decode($res);
			    }
			}
			$members = array("654806913");
			foreach ($members as $member) {
				bot('sendMessage', [
					'chat_id'=>$member,
				    'text'=>"Vasiyning ismi: $fiov \nBolaning ismi: $fioa \nSinf: $sinf -sinf \nTelefon raqamlar: $tel1 ,$tel2 \nYashash joyi: $adress \n",
				]);
			   $filelink = "http://malikaeducation.uz/arizalar/ariza/zip/".$pathname.".zip";
				bot('sendDocument',[
				    'chat_id'=>$member,
				    'document'=>$filelink,
				]);
			}
			//------------------------------------------------------------------------------------
			
			// sleep(0.5); yarim sekund uxlash :)

			if($res){
				include_once "yuklash.php";
				echo("<script>location.href=\"download.php?file=$pathname\"</script>");
			}
		}
		else{
			echo("<script>alert(\"Xatolik yuz berdi\")</script>");
		}

	}
}
?>
