<?php 

class Dil 
{

    public static function diliGetir()
    {
        global $dbname;
        $query = Database::queryAlone("SELECT `deger` FROM ".$dbname.".ayarlar WHERE `ayar` = 'dil'");
        return $query["deger"];
    }


    public static function ayGetir($ay, $kisalt = false)
    {
        switch($ay)
        {
            case 1:
                $yazi = self::cevir("ocak");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 2:
                $yazi = self::cevir("şubat");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 3:
                $yazi = self::cevir("mart");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 4:
                $yazi = self::cevir("nisan");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 5:
                $yazi = self::cevir("mayıs");
                $kisalt = mb_substr($yazi, 0, 3);
                break;
            case 6:
                $yazi = self::cevir("haziran");
                $kisalt = mb_substr($yazi, 0, 4);
                break;
            case 7:
                $yazi = self::cevir("temmuz");
                $kisalt = mb_substr($yazi, 0, 4);
                break;
            case 8:
                $yazi = self::cevir("ağustos");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 9:
                $yazi = self::cevir("eylül");
                $kisalt = mb_substr($yazi, 0, 4).'.';
                break;
            case 10:
                $yazi = self::cevir("ekim");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 11:
                $yazi = self::cevir("kasım");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            case 12:
                $yazi = self::cevir("aralık");
                $kisalt = mb_substr($yazi, 0, 3).'.';
                break;
            default:
                $yazi = "<code>Hata ! Geçersiz Ay !</code>";
        }
        if($kisalt == true)
        {
            return $kisalt;
        } else {
            return $yazi;
        }
    }


    public static function cevir($string)
    {
        $dil = self::diliGetir();

        switch($dil)
        {
            case "tr":
                $ifadeler = array(


                    /* Giriş */
                    "giriş" => "Giriş yap",
                    "hesapGir" => "Hesabınıza giriş yapın.",
                    "kAdı" => "Kullanıcı Adı",
                    "şifre" => "Şifre",
                    "girişVar" => "Zaten giriş yaptınız.",
                    "boşAlan" => "Lütfen boş alan bırakmayın.",
                    "yanlışVeri" => "Yanlış veri girdiniz.",
                    "girişYapıldı" => "Başarıyla Giriş Yaptınız. Yönlendiriliyorsunuz.",
                    "baglanFacebook"=> "Facebook ile bağlan",
                    "baglanGoogle"=> "Google ile bağlan",
                    "hatırla" => "Bu cihazda beni hatırla",
                    "hesabınYokmu" => "Hesabın yok mu?",
                    "hemenBirtaneOluşturun" => "Hemen bir tane oluştur!",
                    /* #Giriş */

                    /* Çıkış */
                    "çıkışBaşarılı" => "Çıkış işlemi başarılı. Yönlendiriliyorsunuz.",
                    "çıkış"=> "Çıkış Yap",
                    /* #Çıkış */

                    /* Kayıt */
                    "ad" => "Ad",
                    "soyad" => "Soyad",
                    "cinsiyet" => "Cinsiyet",
                    "profilResmi" => "Profil Resmi",
                    "kız" => "Kız",
                    "erkek" => "Erkek",
                    "telefon" => "Telefon numarası",
                    "eposta" => "Eposta adresi",
                    "tümAlanlarıDoldurun" => "Lütfen tüm alanları doldurun.",
                    "kullanıcıZatenVar" => "Böyle bir kullanıcı zaten var.",
                    "kayıtBaşarılı" => "<h4 class='alert-heading'>Tebrikler!</h4>
                                        <p>Başarıyla Kaydoldunuz.</p>
                                        <hr>
                                        <p class='mb-0'>Sorularınız yanıtsız kalmasın!</p>",
                    /* #Kayıt */

                    /* Hesap */
                    "soruSayısı" => "Soru Sayısı: ",
                    "yorumSayısı" => "Yorum Sayısı: ",
                    "tümSorular" => "Tüm Soruları Bul",
                    /* #Hesap */

                    /* Admin */
                    "silmeBaşarılı" => "Silme işlemi başarılı.",
                    "silmeBaşarısız" => "Silme işlemi başarısız.",
                    "adminSilemezsin" => "Adminleri silemezsiniz.",
                    "düzenle" => "Düzenle",
                    "duzenlemeBaşarılı" => "Kullanıcı düzenleme başarılı.",
                    "duzenlemeBaşarısız" => "Kullanıcı düzenleme başarısız.",
                    "logTemizleBaşarılı" => "Log temizleme işlemi başarılı.",
                    "logTemizleBaşarısız" => "Log temizleme işlemi başarısız",
                    /* #Admin */

                    /* Sorular */
                    "soruEklemekİçinGirişYap" => "Soru eklemek için giriş yapmalısınız.",
                    "soruBaşarılı" => "Sorunuz başrıyla eklendi. Yönlendiriliyorsunuz.",
                    "yorumlar" => "Yorumlar",
                    /* #Sorular */

                    /* Soru Ekle */
                    "soruEkle" => "Soru Ekle",
                    "soruBaşlığı" => "Soru Başlığı",
                    "kategoriSeç" => "Kategori Seç",
                    "sorunuzNedir" => "Sorunuz Nedir?",
                    /* #Soru Ekle */

                    /* Yorum */
                    "yorumYap" => "Yorum Yap",
                    "boşYorum" => "Boş yorum gönderemezsiniz.",
                    "yorumBaşarılı" => "Yorumunuz başarıyla eklendi. Yönlendiriliyorsunuz.",
                    /* #Yorum */

                    /* Menü */
                    "hesapYönetimi" => "Hesap Yönetimi",
                    /* #Menü */


                    /* Genel */

                    "baslik" => Core::siteBasligi(),
                    "anasayfa" => "Anasayfa",
                    "ara" => "Sorun nedir?",
                    "slogan"=> "Tüm soruların cevabı burada!",
                    "şifreUnuttum" => "Şifreni mi unuttun?",
                    "kayıt" => "Kayıt ol",
                    "dahaFazlaGöster" => "Daha fazla göster",
                    "geri" => "Geri",
                    "kullanıcı/eposta" => "Kullanıcı adı / Eposta",
                    "evet" => "Evet",
                    "hayır" => "Hayır",
                    "çıkışEminmisin" => "Çıkış yapmak istediğinize emin misiniz?",
                    "kapat" => "Kapat",
                    "sorunOluştu" => "Bir sorun oluştu. Lütfen yönetime bildiriniz.",

                    /* #Genel */

                    /* 404 */

                    "hata404" => "<h1>Sayfa Bulunamadı ! <br> Error 404</h1><h3>İstediğiniz sayfa bulunamadı.<br>Ana Sayfa'ya yönlendiriliyorsunuz.</h3>",
                    /* #404 */

                    /* Aylar */
                    "ocak" => "Ocak",
                    "şubat" => "Şubat",
                    "mart" => "Mart",
                    "nisan" => "Nisan",
                    "mayıs" => "Mayıs",
                    "haziran" => "Haziran",
                    "temmuz" => "Temmuz",
                    "ağustos" => "Ağustos",
                    "eylül" => "Eylül",
                    "ekim" => "Ekim",
                    "kasım" => "Kasım",
                    "aralık" => "Aralık",
                    /* #Aylar */

                    /* Footer */ 
                    "kategoriler" => "Kategoriler",
                    "aboneol" => "Abone ol",
                    "copyright" => Core::siteBasligi()." @2018. Tüm hakları saklıdır.",



                    /* #Footer */



                );
                break;
            case "en":
                $ifadeler = array(

                    /* Giriş */
                    "giriş" => "Login",
                    "hesapGir" => "Login to your account.",
                    "kAdı" => "Username",
                    "şifre" => "Password",
                    "girişVar" => "You are already logged in.",
                    "boşAlan" => "Please don't leave any space.",
                    "yanlışVeri" => "You entered the wrong data.",
                    "girişYapıldı" => "You have successfully entered. Redirecting.",
                    "baglanFacebook"=> "Connect with Facebook",
                    "baglanGoogle"=> "Connect with Google",
                    "hatırla" => "Remember me on this device",
                    /* #Giriş */

                    /* Menü */

                    "hesapYönetimi" => "Account Management",
                    "çıkış"=> "Logout",
                    /* #Menü */

                    /* Genel */

                	"baslik" => Core::siteBasligi(),
                    "anasayfa" => "HomePage",
                    "ara" => "What is the problem?",
                    "slogan" => "The answer to all the questions is here!",
                    "sifreUnuttum" => "Forgot Password",
                    "kayıt" => "Register",
                    "dahaFazlaGöster" => "Show more",
                    "geri" => "Back",
                    "kullanıcı/eposta" => "Username / Email",
                    "evet" => "Yes",
                    "hayır" => "No",
                    "çıkışEminmisin" => "Are you sure you want to log out?",
                    /* #Genel */

                    /* Aylar */
                    "ocak" => "January",
                    "şubat" => "February",
                    "mart" => "March",
                    "nisan" => "April",
                    "mayıs" => "May",
                    "haziran" => "June",
                    "temmuz" => "July",
                    "ağustos" => "August",
                    "eylül" => "September",
                    "ekim" => "October",
                    "kasım" => "November",
                    "aralık" => "December",
                    /* #Aylar */

                    /* Sorular */
                    "soruEklemekİçinGirişYap" => "You must log in to add a question.",
                    /* #Sorular */


                    /* Footer */ 
                    "kategoriler" => "Categories",
                    "aboneol" => "Subscribe",
                    "copyright" => Core::siteBasligi()." @2018. All rights reserved.",



                    /* #Footer */



                );
                break;
        }
        if(!isset($ifadeler[$string]))
        {
            return "Hata ! Lütfen kontrol edin: classlar/Dil.class.php";
        } else {
            return $ifadeler[$string];
        }

    }

}


 ?>