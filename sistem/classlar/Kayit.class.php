<?php 

Class Kayit {

    public function kaydet($ad, $soyad, $kAdi, $sifre, $eposta, $cinsiyet, $telefon, $kTarihi, $avatar)
    {
        global $dbname;
        $sorgu = Database::query(
            "INSERT INTO ".$dbname.".kullanici (`ad`, `soyad`, `kAdi`, `sifre`, `eposta`, `cinsiyet`, `telefon`,
            `kTarihi`, `avatar`) VALUES
              (?, ?, ?, PASSWORD(?), ?, ?, ?, ?, ?)", array($ad, $soyad, $kAdi, $sifre,
            $eposta, $cinsiyet, $telefon, $kTarihi, $avatar));
        return $sorgu;
    }

    public function kullaniciVarmi($kAdi)
    {
        global $dbname;
        $query = Database::query("SELECT * FROM ".$dbname.".kullanici WHERE kAdi = ?", array($kAdi));
        if($query > 0)
        {
            return true;
        } else {
            false;
        }
    }
}


?>