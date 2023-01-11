<?php 
class Linkler {

	public static function urlGetir($title)
	{
        $title = mb_strtolower($title);
        global $dbname;
        $query = Database::queryAlone("SELECT `link` FROM ".$dbname.".linkler WHERE `baslik` = ?", array($title));
        return $query["link"];
	}


	public static function menu() 
	{
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".linkler WHERE `gorunurluk` = 1");
		$items = $rows;
		foreach($items as $item)
		{
			echo '<li><a href='.$item['link'].'>'.$item['ustBaslik'].'</a></li>';
		}
	}

	public static function slider()
	{
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".kategori WHERE `gorunurluk` = 1");
		$items = $rows;
		foreach($items as $item)
		{
			echo 	'			<div class="swiper-slide">
					<a class="slider-category" href="index.php?s=kategori&id='.$item['id'].'">
						<div class="blog-image"><img src=images/kategori/'.$item['kategoriResim'].'></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>'.$item['kategoriBaslik'].'</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div>';
		}
	}

	public static function kategori() 
	{
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".kategori WHERE `gorunurluk` = 1 ");
		$items = $rows;
		foreach ($items as $item) 
		{
			echo '<li><a href="index.php?s=kategori&id='.$item['id'].'">'.$item['kategoriBaslik'].'</a></li>';
		}
	}

	public static function sosyal()
	{
		global $dbname;
		$rows = Database::queryAll("SELECT * FROM ".$dbname.".sosyal WHERE `gorunurluk` = 1");
		$items = $rows;
		foreach($items as $item)
		{
			echo '<li><a href='.$item['link'].'><i class='.$item['resimLink'].'></i></a></li>';
		}
			
	}


    public static function tasarimci()
    {
        global $dbname;
        $query = Database::queryAlone("SELECT `deger` FROM ".$dbname.".ayarlar WHERE `ayar` = 'tasarımcı'");
        return $query["deger"];
    }

    public static function tasarimciLink()
    {
        global $dbname;
        $query = Database::queryAlone("SELECT `deger` FROM ".$dbname.".ayarlar WHERE `ayar` = 'tasarımcıLink'");
        return $query["deger"];
    }



}


 ?>