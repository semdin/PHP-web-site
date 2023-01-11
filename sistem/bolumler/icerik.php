		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12">


	<?php 


	if(empty($_GET['id']))
	{
		echo 	'<h3>'.$siteBasligi.Core::baslikYazdir().' <hr></h3>';
	}
	elseif(isset($_GET['id']) && $_GET['s'] == "soruekle")
	{
		echo 	'<h3>'.$siteBasligi.Core::baslikYazdir().' </h3>';
	}
	else
	{
		if ($_GET['s'] == "kategori") {
			$id = $_GET['id'];
			echo 	'<h3>'.$siteBasligi. ' - ' .Kategoriler::kategoriAdi($id).' </h3>';
		}
	}

	?>






<?php
	$yonlendir = new Yonlendirme();
?>



				</div><!-- col-lg-8 col-md-12 -->