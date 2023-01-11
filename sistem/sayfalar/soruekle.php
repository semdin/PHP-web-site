<?php

	if (isset($_POST["soruekle"])) 
	{
	    $soruBasligi = $_POST["soruBasligi"];
		$kategori = $_POST["kategori"];
		$soru = $_POST["soru"];
		$soran = $_SESSION["username"];
		$soranId = Kullanici::kullaniciId($soran);		
		$tarih = date('Y-m-d H:i:s');

		if(empty($soruBasligi) OR empty($soru))
		{
			echo Core::sonuc(Dil::cevir("boşAlan"), 2);

		} 
		else
		{
			Sorular::soruEkle($soruBasligi, $kategori, $soru, $soranId, $tarih);
		}


	}


	if(Kullanici::girisVarmi())
		{
	    	echo'
	    		<form method="post" action="'.Linkler::urlGetir("soruekle").'">
				  <div class="form-group">
				    <label for="exampleFormControlInput1">'.Dil::cevir("soruBaşlığı").'</label>
				    <input type="text" name="soruBasligi" class="form-control">
				  </div>';
				    

				    Sorular::soruEkleKategoriListele();
				

			echo'
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">'.Dil::cevir("sorunuzNedir").'</label>
				    <textarea name="soru" class="ckeditor" rows="3"></textarea>
				  </div>

		  		<button type="submit" name="soruekle" class="btn btn-primary">'.Dil::cevir("soruEkle").'</button>
			</form>';
		}		
	else
	{
		echo Core::sonuc(Dil::cevir("soruEklemekİçinGirişYap"), 2);
	    Core::yonlendir(Linkler::urlGetir("giris"), 2);
	}

?>

