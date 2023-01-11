<?php
	global $siteBasligi;
	if(Kullanici::girisVarmi()==false)
	{
	    Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
	}

 ?>
 <?= '<h3>'.$siteBasligi.Core::baslikYazdir().' - '.$_SESSION["username"].' </h3><hr>';  ?>
<?php

	$hesap = $_SESSION["username"]; 
	$hesapId = Kullanici::kullaniciId($hesap);

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		Hesap::kullaniciSoruListele($id);
	}

?>