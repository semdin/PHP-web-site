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

	if (isset($_POST["ayarKaydet"])) 
	{
		$site_baslik = $_POST["site_baslik"];
		$site_tasarimci = $_POST["site_tasarimci"];
		$site_tasarimciLink = $_POST["site_tasarimciLink"];

		if (empty($site_baslik) OR empty($site_tasarimci) OR empty($site_tasarimciLink))
		{
		$sonuc = Core::sonuc(Dil::cevir("tümAlanlarıDoldurun"), 2);
		}
		else
		{
			$sorgu1 = Genel::baslikDuzenle($site_baslik);
			$sorgu2 = Genel::tasarimciDuzenle($site_tasarimci);
			$sorgu3 = Genel::tasarimciLinkDuzenle($site_tasarimciLink);
			if ($sorgu1 > 0 AND $sorgu2 > 0 AND $sorgu3 > 0)
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

	$baslik = Genel::ayarlar("siteBasligi");
	$tasarimci = Genel::ayarlar("tasarımcı");
	$tasarimciLink = Genel::ayarlar("tasarımcıLink");

 ?>

                 <form method="post" action="index.php?s=siteayar">
                  <div class="row">
                    <div class="col-6">
                      <label for="site_baslik">Site Başlığı</label>
                      <input type="text" name="site_baslik" class="form-control"  value="<?= $baslik; ?>">
                    </div>
                    <div class="col-6">
                      <label for="site_tasarimci">Tasarımcı</label>
                      <input type="text" name="site_tasarimci" class="form-control"  value="<?= $tasarimci; ?>">
                    </div>
                    <div class="col-6">
                      <label for="site_tasarimciLink">Tasarımcı Link</label>
                      <input type="text" name="site_tasarimciLink" class="form-control" value="<?= $tasarimciLink; ?>">
                    </div>
                    <div class="col-12">
                      <div class="modal-footer">
                      <button type="submit" name="ayarKaydet" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                  </div>
                </form>