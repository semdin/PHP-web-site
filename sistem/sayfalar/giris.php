<?php 
	if(Kullanici::girisVarmi())
	{
	    echo "<p>".Dil::cevir("girişVar")."</p>";
	} 
	else 
	{
		$giris = new Giris();

		if (isset($_POST["giris"])) 
		{
		    $kAdi = $_POST["kAdi"];
		    $sifre = $_POST["sifre"];


			if (empty($kAdi) OR empty($sifre))
			{
		        $sonuc = Core::sonuc(Dil::cevir("boşAlan"), 2);
			}
			elseif (!$giris->girisDogrula($kAdi, $sifre)) {
		        $sonuc = Core::sonuc(Dil::cevir("yanlışVeri"), 2);
		        /*$giris->basarisizGirisKaydet();*/
		    }
		    else
		    {
				$sonuc = Core::sonuc(Dil::cevir("girişYapıldı"), 1);
		    	$_SESSION["username"] = $kAdi;
		    	Core::yonlendir(Linkler::urlGetir("hesap"), 2);
		    }
		}
	}

	if (isset($sonuc)) {
		echo $sonuc;
	}

 ?>

       <div class="modal-body">
		<form method="post" action="<?= Linkler::urlGetir("giris");?>">
		  <div class="form-group">
		    <label for="kAdi"><?=Dil::cevir("kAdı"); ?></label>
		    <input type="text" name="kAdi" class="form-control" id="kAdi" aria-describedby="emailHelp" placeholder="">
		    <small id="emailHelp" class="form-text text-muted"><?=Dil::cevir("hesabınYokmu"); ?> <a href="<?= Linkler::urlGetir("kayit");?>"><?=Dil::cevir("hemenBirtaneOluşturun"); ?></a></small>
		  </div>
		  <div class="form-group">
		    <label for="sifre"><?=Dil::cevir("giriş"); ?></label>
		    <input type="password" name="sifre" class="form-control" id="sifre" placeholder="">
		  </div>
      </div>
		<div class="modal-footer">
		<button type="submit" name="giris" class="btn btn-primary"><?= Dil::cevir("giriş"); ?></button>
		</form>
			</div>