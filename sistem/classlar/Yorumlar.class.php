<?php 
Class Yorumlar{


	public static function yorumYazdir()
	{

		$id = $_GET['id'];
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".yorumlar INNER JOIN kullanici ON yorumlar.yorumcu_id = kullanici.id INNER JOIN sorular on yorumlar.yorum_soru_id = sorular.soru_id WHERE soru_id =".$id);
		$items = $rows;



		foreach($items as $item)
		{

                $tarihOrijinal = $item["gonderme_tarihi"];
                $tarih = explode("-", $tarihOrijinal);
                $gun = explode(" ", $tarih[2]);
                $ay = $tarih[1];
                $yil = $tarih[0];

			echo '					<div class="commnets-area ">

						<div class="comment">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="images/'.$item['avatar'].'" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>'.$item['kAdi'].'</b></a>
									<h6 class="date">'.$gun[0].' '.Dil::ayGetir($ay).' '.$yil.' - '.$gun[1].'</h6>
								</div>

							</div><!-- post-info -->

								<p> '.$item['yorum'].' </p>

						</div>

					</div><!-- commnets-area -->';
		}
	}

	public static function yorumPaneli($soruId)
	{
		echo '<div class="comment-form"> 			    	
		<h3 id="yorum">'.Dil::cevir("yorumYap").'</h3>';
			
		if (Kullanici::girisVarmi())
		{
			echo '<form method="post" action="'.Linkler::urlGetir("yorumekle").'">
			  <div class="row">
			    <div class="col-12">
 					<textarea name="yorum" class="ckeditor" rows="3"></textarea>
			    </div>
				<div class="col-12">
				    <input type="hidden" name="soruId" value="'.$soruId.'" class="form-control">
				</div>
			    <div class="col-12">
			      <button type="submit" name="yorumekle" class="btn btn-primary">'.Dil::cevir("yorumYap").'</button>
			    </div>
			  </div>
			</form>';
		}
		else
		{
			echo 'Yorum yapabilmek için lütfen <a href="'.Linkler::urlGetir("giris").'">'.Dil::cevir('giriş').'</a>ın veya <a href="'.Linkler::urlGetir("kayit").'">'.Dil::cevir('kayıt').'</a>un.';
		}



			echo '</div><!-- comment-form -->';
	}

	public static function yorumEkle($yorum, $soruId, $yorumcuId, $tarih)
	{

        global $dbname;
		$query = Database::query("INSERT INTO ".$dbname.".yorumlar (yorum, yorum_soru_id, yorumcu_id, gonderme_tarihi) VALUES (?,?,?,?)", array($yorum, $soruId, $yorumcuId, $tarih));
	
		if($query > 0){
			echo Core::sonuc(Dil::cevir("yorumBaşarılı"), 1);;
			Core::yonlendir("index.php?s=soru&id=".$soruId,2);
		}
		else
		{
			echo Core::sonuc(Dil::cevir("sorunOluştu"), 2);;
		}
	}
}



?>