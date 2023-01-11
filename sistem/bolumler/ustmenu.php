	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<?php Linkler::menu(); ?>
				<?php
					if (Kullanici::girisVarmi()) {
						echo '<li><a href='.Linkler::urlGetir("hesap").'>'.Dil::cevir("hesapYönetimi").'</a></li>';
						echo '<li><a href="#" data-toggle="modal" data-target="#exampleModal">'.Dil::cevir("çıkış").'</a></li>';
					}
					else
					{
						echo '<li><a href='.Linkler::urlGetir("kayit").'>'.Dil::cevir("kayıt").'</a></li>';
						echo '<li><a href="#" data-toggle="modal" data-target="#modalgiris">'.Dil::cevir("giriş").'</a></li>';
					}

				 ?>
			</ul>
<!-- #main-menu -->

<!-- Modal Çıkış -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= Dil::cevir("çıkış"); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?= Dil::cevir("çıkışEminmisin"); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= Dil::cevir("hayır"); ?></button>
        <button class="btn btn-danger" type="button"><a href="<?= Linkler::urlGetir("cikis") ?>"><?= Dil::cevir("evet"); ?></a></button>
      </div>
    </div>
  </div>
</div>
<!-- #Modal Çıkış -->

<!-- Modal Giriş-->
<div class="modal fade" id="modalgiris" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?=Dil::cevir("giriş"); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="post" action="<?= Linkler::urlGetir("giris");?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1"><?=Dil::cevir("kAdı"); ?></label>
		    <input type="text" name="kAdi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
		    <small id="emailHelp" class="form-text text-muted"><?=Dil::cevir("hesabınYokmu"); ?> <a href="<?= Linkler::urlGetir("kayit");?>"><?=Dil::cevir("hemenBirtaneOluşturun"); ?></a></small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1"><?=Dil::cevir("giriş"); ?></label>
		    <input type="password" name="sifre" class="form-control" id="sifre" placeholder="">
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= Dil::cevir("kapat");  ?></button>
		  <button type="submit" name="giris" class="btn btn-primary"><?= Dil::cevir("giriş"); ?></button>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- #Modal Giriş-->



		</div><!-- conatiner -->
	</header>