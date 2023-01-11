<?php 	

	if(Kullanici::girisVarmi()==false)
	{
	    Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
	}

 ?>

<?= Dil::cevir("hesapYönetimi").' - '.$_SESSION["username"];  ?>
<?php

	$hesap = $_SESSION["username"]; 
	$hesapId = Kullanici::kullaniciId($hesap);

?>


					<div class="commnets-area ">

						<div class="comment">
							<div class="post-info">

								<div class="left-area">

									<a class="avatar"><img src="images/<?= Hesap::profilResmi($hesap); ?>" alt="Profile Image"></a>
								</div>

								<div class="middle-area">

										<div class="card" style="width: 100%;">
										  <div class="card-header">
										    Profil
										  </div>
										  <ul class="list-group list-group-flush">
										    <li class="list-group-item"><?= Dil::cevir("soruSayısı"); echo Hesap::soruSayisi($hesap); ?></li>
										    <li class="list-group-item"><?= Dil::cevir("yorumSayısı"); echo Hesap::yorumSayisi($hesap); ?></li>
										    <li class="list-group-item"><button class="btn btn-success" type="button"><a href="index.php?s=sorulistele&id=<?= $hesapId?>"><?= Dil::cevir("tümSorular");  ?></a></button></li>
										  </ul>
										</div>
								</div>

							</div><!-- post-info -->

						</div>

					</div><!-- commnets-area -->

<?php 
	if(Kullanici::adminMisin($hesap))
	{
		echo '							
		<h4 class="title"><b>Admin Paneli</b></h4>

			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Kullanıcı</th>
			      <th scope="col">Genel Ayarlar</th>
			      <th scope="col">Loglar</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><button class="btn btn-secondary" type="button"><a href="'.Linkler::urlGetir("klistele").'">Kullanıcı Listele</a></button></td>
			      <td><button class="btn btn-secondary" type="button"><a href="'.Linkler::urlGetir("siteayar").'">Site Ayarları</a></button></td>
			      <td><button class="btn btn-secondary" type="button"><a href="'.Linkler::urlGetir("sorulog").'">Soru Okuma Logları</a></button></td>
			    </tr>
			  </tbody>
			</table>
';
	}
 ?>


