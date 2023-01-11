<?php 

Class Kategoriler {

		public static function kategoriliSoruListele()

	{

		$id = $_GET['id'];
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".sorular INNER JOIN kullanici ON sorular.yazar_id = kullanici.id INNER JOIN kategori ON sorular.kategori_id = kategori.id WHERE kategori_id = ? order by sorular.soru_id desc" , array($id));
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

	public static function kategoriAdi($id)
	{
        global $dbname;
        $query = Database::queryAlone("SELECT `kategoriBaslik` FROM ".$dbname.".kategori WHERE `id` = '".$id."'");
        return $query["kategoriBaslik"];
	}
}


?>