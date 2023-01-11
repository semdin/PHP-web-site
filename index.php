<?php 
session_start();
require_once("sistem/ayar.php");
$siteBasligi = Core::siteBasligi();
 ?>
<!DOCTYPE HTML>
<html lang="tr">
<head>
	<title><?= $siteBasligi.Core::baslikYazdir() ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="tasarim/css/bootstrap.css" rel="stylesheet">

	<link href="tasarim/css/ionicons.css" rel="stylesheet">

	<link href="tasarim/css/swiper.css" rel="stylesheet">

	<link href="tasarim/css/styles.css" rel="stylesheet">

	<link href="tasarim/css/responsive.css" rel="stylesheet">

	<link href="tasarim/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="tasarim/ckeditors/ckeditor.js"></script>

</head>
<body >

	<?php include 'sistem/bolumler/ustmenu.php'; ?>

	<?php include 'sistem/bolumler/slider.php'; ?>


<section class="blog-area section">

	<?php include 'sistem/bolumler/icerik.php'; ?>

	<?php include 'sistem/bolumler/sagmenu.php'; ?>

	<?php include 'sistem/bolumler/footer.php'; ?>


	<!-- SCIPTS -->
	<script src="tasarim/js/jquery-3.1.1.min.js"></script>

	<script src="tasarim/js/tether.min.js"></script>

	<script src="tasarim/js/bootstrap.js"></script>

	<script src="tasarim/js/swiper.js"></script>

	<script src="tasarim/js/scripts.js"></script>

</body>
</html>
