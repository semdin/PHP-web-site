<?php 
	if(Kullanici::girisVarmi()==false)
	{
	    Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
	}
	else
	{
		$hesap = $_SESSION["username"];
		$sorgu = Kullanici::adminMisin($hesap);
		if($sorgu==FALSE)
		{
	    	Core::yonlendir(Linkler::urlGetir("anasayfa"), 0);
		}
	}


	if(isset($_GET['temizle']))
	{
		echo Genel::soruLogTemizle();
	}


 ?>

 <table class="table">
	<thead class="thead-dark">
	<tr>
		<th scope="col">Log_id</th>
		<th scope="col">Kullanıcı IP</th>
		<th scope="col">Log_soru_id</th>
		<th scope="col">Tarih</th>
	</tr>
	</thead>
	<tbody>
		<?php  Genel::soruLogListele(); ?>
	</tbody>
</table>
<div class="col-12">
<div class="modal-footer">
<button class="btn btn-secondary" type="button"><a href="index.php?s=sorulog&temizle">Logları Temizle</a></button>
</div>
</div>