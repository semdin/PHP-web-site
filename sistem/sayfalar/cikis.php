
<?php

if(Kullanici::girisVarmi())
{
	$_SESSION = array();
	session_destroy();
    echo Core::sonuc(Dil::cevir("çıkışBaşarılı"), 4);
	Core::yonlendir(Linkler::urlGetir("anasayfa"), 2);
}
else
{
	Core::yonlendir(Linkler::urlGetir("hata"), 0);
}
?>