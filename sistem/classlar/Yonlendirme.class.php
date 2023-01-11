<?php

class Yonlendirme
{

    public function aktifLinkler($what)
    {
        $allowed = array(
            "kayit", "hata", "giris", "hesap", "cikis", "soruekle", "yorumekle", "sorulistele", "klistele", "siteayar", "sorulog",
        );
        if(in_array($what, $allowed))
        {
            return true;
        } else {
            return false;
        }
    }

    public function __construct()
    {

        if(isset($_GET['s']))
        {
            $file = 'sistem/sayfalar/'.$_GET['s'].'.php';
            if(file_exists($file) AND filesize($file) != 0 AND self::aktifLinkler($_GET["s"]))
            {
                require_once($file);
            } 
            elseif($_GET['s'] == "kategori")
            {
                if(isset($_GET['id']))
                {
                $sorular = new Sorular();
                $id = $_GET['id'];
                Sorular::soruEkleButon($id);
                Kategoriler::kategoriliSoruListele();
                }

            }
            elseif($_GET['s'] == "soru")
            {
                if(isset($_GET['id']))
                {
                $id = $_GET['id'];
                $sorular = new Sorular();
                Sorular::soruYazdir();
                Yorumlar::yorumPaneli($id);
                }

            }

            else 
            {
                Core::yonlendir(Linkler::urlGetir("hata"),0);
                die();
            }
        } else {
            require_once('sistem/sayfalar/anasayfa.php');
        }
    }

}

?>