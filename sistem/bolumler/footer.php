	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>
						<p class="copyright"><?= Dil::cevir("copyright"); ?></p>
						<p class="copyright">Designed by <a href='<?= Linkler::tasarimciLink() ?>' target="_blank"><?= Linkler::tasarimci(); ?></a></p>
						<ul class="icons">

							<?php Linkler::sosyal(); ?>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-6 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b><?= Dil::cevir("kategoriler"); ?></b></h4>
						<ul>
							<?php Linkler::kategori(); ?>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>