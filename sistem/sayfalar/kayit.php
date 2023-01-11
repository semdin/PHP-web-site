<?php
$kayit = new Kayit();

if(isset($_POST['kayit']))
    {
      $ad = $_POST['kayit_ad'];
      $soyad = $_POST['kayit_soyad'];
      $kAdi = $_POST['kayit_kAdi'];
      $sifre = $_POST['kayit_sifre'];
      $eposta = $_POST['kayit_eposta'];
      $cinsiyet = $_POST['kayit_cinsiyet'];
      $telefon = $_POST['kayit_telefon'];
      $kTarihi = date('Y-m-d H:i:s');

      if($cinsiyet == 1)
      {
        $avatar = "avatar2.png";
      }
      else
      {
        $avatar = "avatar.png";
      }

      if (empty($ad) OR empty($soyad) OR empty($kAdi) OR empty($sifre) OR empty($eposta) OR empty($cinsiyet) OR empty($telefon))
      {
        $sonuc = Core::sonuc(Dil::cevir("tümAlanlarıDoldurun"), 2);
      }
      elseif ($kayit->kullaniciVarmi($kAdi)) 
      {
        $sonuc = Core::sonuc(Dil::cevir("kullanıcıZatenVar"), 2);
      }
      else 
      {
        if ($kayit->kaydet($ad, $soyad, $kAdi, $sifre, $eposta, $cinsiyet, $telefon, $kTarihi, $avatar) > 0) 
        {
          $sonuc = Core::sonuc(Dil::cevir("kayıtBaşarılı"), 1);
        }
      }

      if (isset($sonuc)) {
          echo $sonuc;
        }
    }
 ?>

<form method="post" action="<?php Linkler::urlGetir('kayit') ?>">
  <div class="row">
    <div class="col-6">
      <label for="kayit_ad"><?= Dil::cevir("ad"); ?></label>
      <input type="text" name="kayit_ad" class="form-control" placeholder="Adınız">
    </div>
    <div class="col-6">
      <label for="kayit_soyad"><?= Dil::cevir("soyad"); ?></label>
      <input type="text" name="kayit_soyad" class="form-control" placeholder="Soyadınız">
    </div>
    <div class="col-6">
      <label for="kayit_kAdi"><?= Dil::cevir("kAdı"); ?></label>
      <input type="text" name="kayit_kAdi" class="form-control" placeholder="Kullanıcı adınız">
    </div>
    <div class="col-6">
      <label for="kayit_sifre"><?= Dil::cevir("şifre"); ?></label>
      <input type="password" name="kayit_sifre" class="form-control" placeholder="Şifreniz">
    </div>
    <div class="col-6">
      <label for="kayit_eposta"><?= Dil::cevir("eposta"); ?></label>
      <input type="email" name="kayit_eposta" class="form-control" placeholder="ornek@example.com">
    </div>
    <div class="col-6">
      <label for="kayit_cinsiyet"><?= Dil::cevir("cinsiyet"); ?></label>
      <select name="kayit_cinsiyet" class="form-control" id="kayit_ad">
        <option value="1"><?= Dil::cevir("kız"); ?></option>
        <option value="2"><?= Dil::cevir("erkek"); ?></option>
      </select>
    </div>
    <div class="col-6">
      <label for="kayit_telefon"><?= Dil::cevir("telefon"); ?></label>
      <input type="text" name="kayit_telefon" class="form-control" placeholder="5xxxxxxxxx">
    </div>
    <div class="col-12">
      <div class="modal-footer">
      <button type="submit" name="kayit" class="btn btn-primary"><?= Dil::cevir("kayıt"); ?></button>
      </div>
    </div>
  </div>
</form>
