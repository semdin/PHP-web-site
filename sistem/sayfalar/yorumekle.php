<?php	


	if (isset($_POST["yorumekle"])) 
	{
	    $yorum = $_POST["yorum"];
		$soruId = $_POST["soruId"];
		$yorumcu = $_SESSION["username"];
		$yorumcuId = Kullanici::kullaniciId($yorumcu);		
		$tarih = date('Y-m-d H:i:s');


      if (empty($yorum))
      {
        echo Core::sonuc(Dil::cevir("boşYorum"), 2);
      }
      else
      {
		Yorumlar::yorumEkle($yorum, $soruId, $yorumcuId, $tarih);
      }
	}
?>