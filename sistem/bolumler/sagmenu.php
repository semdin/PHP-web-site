				<div class="col-lg-4 col-md-12 ">

					<div class="single-post info-area">

						<div class="about-area">
							<h4 class="title"><b>SON 5 SORU</b></h4>
							<table class="table">
							  <thead class="thead-light">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Kullanıcı</th>
							      <th scope="col">Soru</th>
							      <th scope="col">Yorumlar</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php Sorular::son5Soru(); ?>
							  </tbody>
							</table>
						</div>

						<div class="subscribe-area">

							<h4 class="title"><b>Son 5 Kullanıcı</b></h4>
							<table class="table">
							  <thead class="thead-light">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Kullanıcı</th>
							      <th scope="col">Ad</th>
							      <th scope="col">Soyad</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php Kullanici::son5Kullanici(); ?>
							  </tbody>
							</table>

						</div><!-- subscribe-area -->

						<div class="tag-area">

							<h4 class="title"><b>Kategoriler</b></h4>
							<ul>
								<?php Linkler::kategori(); ?>
							</ul>

						</div><!-- subscribe-area -->

					</div><!-- info-area -->

				</div><!-- col-lg-4 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->
