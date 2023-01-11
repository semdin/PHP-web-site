<?php 
class Kullanici {

    public static function girisVarmi()
    {
        if(isset($_SESSION["username"]) AND $_SESSION["username"] != NULL)
        {
            return true;
        } else {
            return false;
        }
    }

	public static function kullaniciId($kullanici)
	{

        global $dbname;
        $query = Database::queryAlone("SELECT `id` FROM ".$dbname.".kullanici WHERE `kAdi` = '".$kullanici."'");
        return $query["id"];
	}


    public static function adminMisin($hesap)
    {

        global $dbname;
        $hesapId = self::kullaniciId($hesap);
        $query = Database::queryAlone("SELECT `admin` FROM ".$dbname.".kullanici WHERE `id` = '".$hesapId."'");
        if($query["admin"]==1)
        {
            return true;
        } else {
            return false;
        }
    }

    public static function adminId($id)
    {

        global $dbname;
        $query = Database::queryAlone("SELECT `admin` FROM ".$dbname.".kullanici WHERE `id` = '".$id."'");
        if($query["admin"]==1)
        {
            return true;
        } else {
            return false;
        }
    }

    public static function son5Kullanici()
    {

        global $dbname;
        $rows = Database::queryAll("SELECT * FROM ".$dbname.".kullanici ORDER BY id DESC LIMIT 5");
        $items = $rows;

        $kullanici = 0;
        foreach($items as $item)
        {
            $ad = $item["ad"];
            if(strlen($ad)>9)
            {
                $yeniAd = substr($ad, 0,9).'...';
            }else
            {
                $yeniAd = $ad;
            }

            $kullanici += 1;

            echo '      <tr>
                                  <th scope="row">'.$kullanici.'</th>
                                  <td>'.$item["kAdi"].'</td>
                                  <td>'.$yeniAd.'</td>
                                  <td><center>'.$item["soyad"].'</center></td>
                                </tr>';

        }
    }

    public static function kListele()
    {
        global $dbname;
        $rows = Database::queryAll("SELECT * FROM ".$dbname.".kullanici");
        $items = $rows;

        foreach ($items as $item) 
        {
            echo'   <tr>
                    <th scope="row">'.$item["id"].'</th>
                    <td>'.$item["kAdi"].'</td>
                    <td>'.$item["ad"]." ".$item["soyad"].'</td>
                    <td>'.$item["eposta"].'</td>
                    <td>
                    <a href="index.php?s=klistele&duzenle='.$item["id"].'" title="düzenle"><i class="fa fa-edit"></i></a>
                    <a href="index.php?s=klistele&sil='.$item["id"].'" title="sil"><i class="fa fa-trash"></i></a>
                    </td>

                    </tr>
                ';
        }
    }

    public static function kullaniciSil($id)
    {
        global $dbname;
        if(self::adminId($id))
        {
            $sonuc = Core::sonuc(Dil::cevir("adminSilemezsin"), 2);
        }
        else
        {
            $sorgu = Database::query("DELETE FROM ".$dbname.".kullanici WHERE id = ? ", array($id));
            if ($sorgu) 
            {
                $sonuc = Core::sonuc(Dil::cevir("silmeBaşarılı"), 1);
            }
            else
            {
                $sonuc = Core::sonuc(Dil::cevir("silmeBaşarısız"), 2);
            }
        }

        return $sonuc;
    }

    public static function kullaniciDuzenle($id)
    {

        global $dbname;
        $sorgu = Database::queryAlone("SELECT * FROM ".$dbname.".kullanici WHERE `id` = '".$id."'");
        echo '
                <form method="post" action="index.php?s=klistele&duzenle='.$id.'">
                  <div class="row">
                    <div class="col-6">
                      <label for="duzenle_ad">'.Dil::cevir("ad").'</label>
                      <input type="text" name="duzenle_ad" class="form-control" placeholder="Adınız" value="'.$sorgu["ad"].'">
                    </div>
                    <div class="col-6">
                      <label for="duzenle_soyad">'.Dil::cevir("soyad").'</label>
                      <input type="text" name="duzenle_soyad" class="form-control" placeholder="Soyadınız" value="'.$sorgu["soyad"].'">
                    </div>
                    <div class="col-6">
                      <label for="duzenle_kAdi">'.Dil::cevir("kAdı").'</label>
                      <input type="text" name="duzenle_kAdi" class="form-control" placeholder="Kullanıcı adınız" value="'.$sorgu["kAdi"].'">
                    </div>
                    <div class="col-6">
                      <label for="duzenle_sifre">'.Dil::cevir("şifre").' (MD5)</label>
                      <input type="text" name="duzenle_sifre" class="form-control" placeholder="Şifreniz" value="'.$sorgu["sifre"].'" disabled>
                    </div>
                    <div class="col-6">
                      <label for="duzenle_eposta">'.Dil::cevir("eposta").'</label>
                      <input type="email" name="duzenle_eposta" class="form-control" placeholder="ornek@example.com" value="'.$sorgu["eposta"].'">
                    </div>
                    <div class="col-6">
                      <label for="duzenle_telefon">'.Dil::cevir("telefon").'</label>
                      <input type="text" name="duzenle_telefon" class="form-control" placeholder="5xxxxxxxxx" value="'.$sorgu["telefon"].'">
                    </div>
                    <div class="col-12">
                      <div class="modal-footer">
                      <button type="submit" name="kDuzenle" class="btn btn-primary">'.Dil::cevir("düzenle").'</button>
                      </div>
                    </div>
                  </div>
                </form>
            ';
    }

    public function duzenle($ad, $soyad, $kAdi, $eposta, $telefon, $id)
    {
        global $dbname;
        $sorgu = Database::query("UPDATE ".$dbname.".kullanici SET ad = ?, soyad = ?, kAdi = ?, eposta = ?, telefon = ? WHERE `id` = ?", array($ad, $soyad, $kAdi, $eposta, $telefon, $id));
        return $sorgu;
    }

}





 ?>