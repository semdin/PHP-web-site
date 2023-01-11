<?php 

Class Sorular {


	public static function soruListele()
	{

		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".sorular INNER JOIN kullanici ON sorular.yazar_id = kullanici.id INNER JOIN kategori ON sorular.kategori_id = kategori.id order by sorular.soru_id desc");
		$items = $rows;

		echo '<div class="row">';

		foreach($items as $item)
		{

			$yorumlar = Database::query("SELECT * FROM ".$dbname.".yorumlar where yorum_soru_id = ".$item["soru_id"]." ");
			$yorumsayisi = $yorumlar;


				echo "		
						<div class=col-md-6 col-sm-12>
							<div class=card h-100>
								<div class=single-post post-style-1>

									<div class=blog-image><img src='images/kategori/".$item["kategoriResim"]."' alt='Blog Image'></div>

									<a class=avatar href='#'><img src='images/".$item["avatar"]."' alt=Profile Image></a>

									<div class=blog-info>

										<h4 class=title><a href='index.php?s=soru&id=".$item["soru_id"]."'><b>".$item["soru_baslik"]."</b></a></h4>

										<ul class=post-footer>
											<li><a><i class=ion-chatbubble></i>".$yorumsayisi."</a></li>
											<li><a><i class=ion-eye></i>".$item["goruntulenme"]."</a></li>
										</ul>

									</div><!-- blog-info -->
								</div><!-- single-post -->
							</div><!-- card -->
						</div><!-- col-md-6 col-sm-12 -->";

		}
		echo '</div><!-- row -->';
	}

	public static function soruYazdir()
	{
		$id = $_GET['id'];
		$ip = $_SERVER["REMOTE_ADDR"];
		global $dbname;

		$rows = Database::queryAll("SELECT * FROM ".$dbname.".sorular INNER JOIN kullanici ON sorular.yazar_id = kullanici.id INNER JOIN kategori ON sorular.kategori_id = kategori.id WHERE soru_id =".$id);
		$items = $rows;

		$ip_sorgu = Database::query("SELECT * FROM ".$dbname.".log WHERE kullanici_ip = ".'?'." AND log_soru_id = ? ", array($ip, $id));


		if(isset($id))
		{
			if ($ip_sorgu == 0)
			{
				$tarih = date('Y-m-d H:i:s');
				Database::query("INSERT INTO ".$dbname.".log (kullanici_ip, log_soru_id, tarih) VALUES (?,?,?)", array($ip, $id, $tarih));
				Database::query("UPDATE ".$dbname.".sorular SET goruntulenme = goruntulenme + 1 WHERE soru_id = ?", array($id));
			}
			else
			{

			}

		}

		foreach($items as $item)
		{

                $tarihOrijinal = $item["yazim_tarihi"];
                $tarih = explode("-", $tarihOrijinal);
                $gun = explode(" ", $tarih[2]);
                $ay = $tarih[1];
                $yil = $tarih[0];

				$yorumlar = Database::query("SELECT * FROM ".$dbname.".yorumlar where yorum_soru_id = ".$item["soru_id"]." ");
				$yorumsayisi = $yorumlar;

			echo "


					<div class='post-area'>

						<div class='post'>

							<div class='post-info'>

								<div class='left-area'>
									<a class='avatar' href='#'><img src='images/".$item['avatar']."' alt='Profile Image'></a>
								</div>

								<div class='middle-area'>
									<a class='name' href='#'><b>".$item['kAdi']."</b></a>
									<h6 class='date'>".$gun[0]." ".Dil::ayGetir($ay)." ".$yil." - ".$gun[1]."</h6>
								</div>

								<div class='right-area'>
									<button class='btn btn-secondary' type='button'><a href='#yorum'>".Dil::cevir("yorumYap")."</a></button>
								</div>

							</div><!-- post-info -->

								<h3>".$item["soru_baslik"]."</h1>

								<p> ".$item['soru_icerik']." </p>

						</div>

							<div class='main-post post-icons-area'>
							<ul class='post-icons'>
							<li><a><i class=ion-chatbubble></i>".$yorumsayisi."</a></li>
							<li><a><i class=ion-eye></i>".$item["goruntulenme"]."</a></li>
							</ul>
						</div>
					</div><!-- post-area -->";

				echo '<br><h4><b>'.Dil::cevir("yorumlar").'('.$yorumsayisi.')</b></h4>';

				echo Yorumlar::yorumYazdir();
		}
	}

	public static function soruEkleButon($id)
	{
		echo '<button onClick=parent.location="index.php?s=soruekle&id='.$id.'" type="button" class="btn btn-secondary btn-lg btn-block">'.Dil::cevir("soruEkle").'</button><hr>';
	}

	public static function soruEkleButonAnasayfa()
	{
		echo '<div class="modal-header">';

		echo '<button onClick=parent.location="index.php?s=soruekle" type="button" class="btn btn-secondary btn-lg btn-block">'.Dil::cevir("soruEkle").'</button><br>';

		echo '</div>';
	}

	public static function soruEkleKategoriListele()
	{


		if(empty($_GET['id']))
		{

			global $dbname;
			$rows = Database::queryAll("SELECT * FROM ".$dbname.".kategori");
			$items = $rows;
			echo '<div class="form-group">
		    <label for="exampleFormControlSelect1">'.Dil::cevir("kategoriSeç").'</label>
		    <select name="kategori" class="form-control" id="exampleFormControlSelect1">';


			foreach($items as $item)
			{
				echo '
					<option value="'.$item['id'].'">'.$item['kategoriBaslik'].'</option>
					';
			}
				
			echo'    </select>
			  </div>';
			}
		else 
		{
			$id = $_GET['id'];
			global $dbname;
			$rows = Database::queryAll("SELECT * FROM ".$dbname.".kategori WHERE kategori.id = ".$id." ");
			$items = $rows;

			echo '<div class="form-group">
			    <label for="exampleFormControlSelect1">'.Dil::cevir("kategoriSeç").'</label>
			    <select name="kategori" class="form-control" id="exampleFormControlSelect1">';


			foreach($items as $item)
			{

				echo '
					<option value="'.$item['id'].'">'.$item['kategoriBaslik'].'</option>
					';
			}
				
			echo'    </select>
			  </div>';
		}
	}

	public static function soruId($soranId)
	{
		global $dbname;
		$query = Database::queryAlone("SELECT `soru_id` FROM ".$dbname.".sorular WHERE `yazar_id` = '".$soranId."' ORDER BY soru_id DESC LIMIT 0,1");
		return $query["soru_id"];
	}

	public static function soruEkle($soruBasligi, $kategori, $soru, $soranId, $tarih)
	{

        global $dbname;
		$query = Database::query("INSERT INTO ".$dbname.".sorular (soru_baslik, soru_icerik, yazar_id, kategori_id, yazim_tarihi) VALUES (?,?,?,?,?)", array($soruBasligi, $soru, $soranId, $kategori, $tarih));

		if($query > 0){
			echo Core::sonuc(Dil::cevir("soruBaşarılı"), 1);;
			$soruId = self::soruId($soranId);
			Core::yonlendir("index.php?s=soru&id=".$soruId,2);
		}
		else
		{
			echo Core::sonuc(Dil::cevir("sorunOluştu"), 2);;
		}
	}

	public static function son5Soru()
	{

		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".sorular INNER JOIN kullanici ON sorular.yazar_id = kullanici.id INNER JOIN kategori ON sorular.kategori_id = kategori.id order by sorular.soru_id desc LIMIT 5");
		$items = $rows;

		$soru = 0;
		foreach($items as $item)
		{
			$baslik = $item["soru_baslik"];
			if(strlen($baslik)>10)
			{
				$yeniBaslik = substr($baslik, 0,10).'...';
			}else
			{
				$yeniBaslik = $baslik;
			}

			$soru += 1;
			$yorumlar = Database::query("SELECT * FROM ".$dbname.".yorumlar where yorum_soru_id = ".$item["soru_id"]." ");
			$yorumsayisi = $yorumlar;

			echo '		<tr>
							      <th scope="row">'.$soru.'</th>
							      <td>'.$item["kAdi"].'</td>
							      <td><a href="index.php?s=soru&id='.$item["soru_id"].'" title="'.$item["soru_baslik"].'">'.$yeniBaslik.'</a></td>
							      <td><center>'.$yorumsayisi.'</center></td>
							    </tr>';

		}
	}

}

 ?>