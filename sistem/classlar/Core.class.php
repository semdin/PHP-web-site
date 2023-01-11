<?php 

class Core
{

    public static function yonlendir($hedef, $sure = 0)
    {
        echo '<meta http-equiv="refresh" content="'.$sure.'; url='.$hedef.'">';
    }

    public static function siteBasligi()
    {
        global $dbname;
        $query = Database::queryAlone("SELECT `deger` FROM ".$dbname.".ayarlar WHERE `ayar` = 'siteBasligi'");
        return $query["deger"];
    }

    public static function baslikYazdir()
    {
        if(isset($_GET["s"]))
        {
            global $dbname;
            //$query = Database::queryAlone("SELECT * FROM ".$dbname.".linkler WHERE `baslik` LIKE '%".$_GET['s']."%' LIMIT 1");
            $query = Database::queryAlone("SELECT * FROM ".$dbname.".linkler WHERE `baslik` LIKE '".$_GET['s']."' LIMIT 1");
            if($query["ustBaslik"] != NULL OR $query["ustBaslik"] != '')
            {
                return ' - '.$query["ustBaslik"];
            }
        }
        else
        {
            return ' - '.Dil::cevir("anasayfa");
        }

    }

    public static function sonuc($yazi, $tip = 3)
    {
        if($tip == 1)
        {
            $html = '
            <div class="alert alert-success" role="alert">
              '.$yazi.'
            </div>';
        }
        elseif($tip == 2)
        {
            $html = '
            <div class="alert alert-danger" role="alert">
              '.$yazi.'
            </div>';
        }
        elseif($tip == 3)
        {
            $html = '
            <div class="alert alert-info" role="alert">
              '.$yazi.'
            </div>';
        }
        elseif($tip == 4)
        {
            $html = '
            <div class="alert alert-warning" role="alert">
              '.$yazi.'
            </div>';
        }
        return $html;
    }
}

?>