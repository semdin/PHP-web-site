<?php 	

	if(Kullanici::girisVarmi()==false)
	{
	    Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
	}
	else
	{
		$hesap = $_SESSION["username"];
		$sorgu = Kullanici::adminMisin($hesap);
		if($sorgu==FALSE)
		{
	    	Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
		}
	}


	if(isset($_GET['sil']))
	{
		$kisi = $_GET['sil'];
		echo Kullanici::kullaniciSil($kisi);
	}



		if(isset($_POST['kDuzenle']))
		{
			$id = $_GET['duzenle'];
			$ad = $_POST['duzenle_ad'];
			$soyad = $_POST['duzenle_soyad'];
			$kAdi = $_POST['duzenle_kAdi'];
			$eposta = $_POST['duzenle_eposta'];
			$telefon = $_POST['duzenle_telefon'];

			if (empty($ad) OR empty($soyad) OR empty($kAdi) OR empty($eposta) OR empty($telefon))
			{
				$sonuc = Core::sonuc(Dil::cevir("tümAlanlarıDoldurun"), 2);
			}
			else
			{
				$sorgu = Kullanici::duzenle($ad, $soyad, $kAdi, $eposta, $telefon, $id);
				if ($sorgu > 0)
				{
          			$sonuc = Core::sonuc(Dil::cevir("duzenlemeBaşarılı"), 1);
				}
				else
				{
          			$sonuc = Core::sonuc(Dil::cevir("duzenlemeBaşarısız"), 2);
				}
			}
			if (isset($sonuc)) 
			{
	          echo $sonuc;
	        }
		}

	if(isset($_GET['duzenle']))
	{
		$id = $_GET['duzenle'];
		echo Kullanici::kullaniciDuzenle($id);
	}

 ?>


<table class="table">
	<thead class="thead-dark">
	<tr>
		<th scope="col">İD</th>
		<th scope="col">Kullanıcı Adı</th>
		<th scope="col">Ad Soyad</th>
		<th scope="col">E-posta</th>
		<th scope="col">Düzenle</th>
	</tr>
	</thead>
	<tbody>
		<?php  Kullanici::kListele(); ?>
	</tbody>
</table>