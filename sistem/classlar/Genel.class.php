<?php 

class Genel{


	public static function ayarlar($ayar)
	{
        global $dbname;
        $query = Database::queryAlone("SELECT `deger` FROM ".$dbname.".ayarlar WHERE `ayar` = ? ",array($ayar));
        return $query["deger"];
	}

    public function baslikDuzenle($site_baslik)
    {
        global $dbname;
        $ayar = "siteBasligi";
        $sorgu = Database::query("UPDATE ".$dbname.".ayarlar SET deger = ? WHERE `ayar` = ?", array($site_baslik, $ayar));
        return $sorgu;
    }

    public function tasarimciDuzenle($site_tasarimci)
    {
        global $dbname;
        $ayar = "tasarımcı";
        $sorgu = Database::query("UPDATE ".$dbname.".ayarlar SET deger = ? WHERE `ayar` = ?", array($site_tasarimci, $ayar));
        return $sorgu;
    }

    public function tasarimciLinkDuzenle($site_tasarimciLink)
    {
        global $dbname;
        $ayar = "tasarımcıLink";
        $sorgu = Database::query("UPDATE ".$dbname.".ayarlar SET deger = ? WHERE `ayar` = ?", array($site_tasarimciLink, $ayar));
        return $sorgu;
    }

    public static function soruLogListele()
    {
        global $dbname;
        $rows = Database::queryAll("SELECT * FROM ".$dbname.".log");
        $items = $rows;

        foreach ($items as $item) 
        {

                $tarihOrijinal = $item["tarih"];
                $tarih = explode("-", $tarihOrijinal);
                $gun = explode(" ", $tarih[2]);
                $ay = $tarih[1];
                $yil = $tarih[0];

            echo'   <tr>
                    <th scope="row">'.$item["log_id"].'</th>
                    <td>'.$item["kullanici_ip"].'</td>
                    <td>'.$item["log_soru_id"].'</td>
                    <td>'.$gun[0].' '.Dil::ayGetir($ay).' '.$yil.' - '.$gun[1].'</td>
                    </tr>
                ';
        }
    }

    public function soruLogTemizle()
    {
    	global $dbname;
 		$sorgu = Database::query("TRUNCATE TABLE ".$dbname.".log");

        if($sorgu)
        {
            $sonuc = Core::sonuc(Dil::cevir("logTemizleBaşarılı"), 1);
        }else
        {
            $sonuc = Core::sonuc(Dil::cevir("logTemizleBaşarılı"), 1);
        }

        return $sonuc;
    }

}



 ?>