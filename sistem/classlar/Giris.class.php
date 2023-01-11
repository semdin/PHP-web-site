<?php 

Class Giris {

    public function sifreCoz($sifre)
    {
        return '*'.strtoupper(hash('sha1',pack('H*',hash('sha1', $sifre))));
    }

    public function girisDogrula($kAdi, $sifre)
    {
        global $dbname;
        $sifre = self::sifreCoz($sifre);
        $query = Database::query("SELECT * FROM ".$dbname.".kullanici WHERE `kAdi` = ? AND `sifre` = ?", array($kAdi, $sifre));
        if($query > 0)
        {
            return true;
        } else {
            return false;
        }
    }

	
}


?>