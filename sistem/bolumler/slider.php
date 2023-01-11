	<div class="slider display-table center-text">
		<h1 class="title display-table-cell2"><b><?= Dil::cevir("baslik");?></b>
			<h3 class="title display-table-cell2"><b><?= Dil::cevir("slogan");?></b></h3>
	</div><!-- slider -->

	<div class="main-slider">
		<div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
			data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
			data-swiper-breakpoints="true" data-swiper-loop="true" >
			<div class="swiper-wrapper">

				<?php Linkler::slider(); ?>

			</div><!-- swiper-wrapper -->

		</div><!-- swiper-container -->

	</div><!-- slider -->
