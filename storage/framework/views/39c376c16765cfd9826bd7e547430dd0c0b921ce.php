<?php $__env->startSection('title'); ?>  Beranda <?php $__env->stopSection(); ?>



<?php $__env->startSection('meta'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('header'); ?>

<header id="content-desktop">

	<section id="slideshow">

	  <div class="slick">

			<?php if(count($slider) > 0): ?>

			<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	    <div>

        <img src="<?php echo e(asset('backend/images/slider/'.$list->img)); ?>" class="" alt="">

      </div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php else: ?>

			<div>

        <img src="<?php echo e(asset('frontend/img/background-header.png')); ?>" class="" alt="">

      </div>

			<div>

        <img src="<?php echo e(asset('frontend/img/background-header2.png')); ?>" class="" alt="">

      </div>

			<div>

        <img src="<?php echo e(asset('frontend/img/background-header3.png')); ?>" class="" alt="">

      </div>

			<?php endif; ?>

	  </div>

	</section>



	<div class="logo-holder">

		<img src="<?php echo e(asset('frontend/img/logoweb.png')); ?>" alt="">

		<h2 class="pl-5 ml-2 f1-l-1"><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?> <?php echo e(ucwords(strtolower($lokasi->nama))); ?> Kecamatan <?php echo e(ucwords(strtolower($lokasi->kecamatan->nama))); ?></h2>

  </div>

</header>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>



<!-- Row Sambutan -->

<section id="sambutan" class="">

	<div class="row no-gutter">

		<?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<!-- foto kades -->

		<div class="col-lg-4 col-md-6 col-sm-12">

			
			<img src="<?php echo e(($profil->foto_kades)?asset('backend/images/profil/kades/'.$profil->foto_kades):asset('backend/images/default.jpg')); ?>" width="100%" height="560px" alt="" style="object-fit:contain">

		</div>

		<!-- text sambutan kades -->

		<div class="col-lg-8 col-md-6 col-sm-12 bg-secondary text-white text-center px-2 py-1">

			<p class="f1-m-3 px-2">

				<?php echo $profil->sambutan; ?>


			</p>

		</div>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>

</section>



<!-- Berita -->

<section class="my-3">

	<div class="container">



		<div class="row">

				<div class="container">

					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Berita</a></span></h2>

				</div>

		</div>



		<div class="row">

          	<?php if(count($beritas) == 0): ?>

				<div class="container"><h4 class="text-center py-2"><strong>Belum ada data</strong></h4></div>

			<?php else: ?>

			<div class="container-fluid" id="content-desktop">

			    <div class="sliderberita row">



						  <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<?php if(count($beritas) < 3): ?>

							<div class="col-md-12 col-lg-12 py-2 px-2 float-left">

							<?php else: ?>

							<div class="col-sm-12 col-md-12 col-lg-4 px-2 py-2">

							<?php endif; ?>

								<!-- Copy the content below until next comment -->

								<div class="card card-custom bg-white border-white border-0">

									<div class="card-custom-img" style="background-image: url(<?php echo e(($berita->img)?asset('backend/images/informasi/berita/'.$berita->img):asset('backend/images/default.jpg')); ?>);"></div>
									
									<div class="card-custom-avatar">

										<img class="img-fluid" src="https://image.freepik.com/free-vector/newspaper-vector-illustration-logo-icon-clipart_7688-575.jpg" alt="" />

									</div>

									<div class="card-body" style="overflow-y: auto">

										<small class="f1-s-3">

											<i class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y')); ?>&nbsp;|

											<i class="fa fa-eye"></i>&nbsp;<?php echo e($berita->hit); ?> Dilihat

										</small>

										<h4 class="card-title"><?php echo e($berita->title); ?></h4>

										<p class="card-text"><?php echo e($berita->short_content); ?></p>

									</div>

									<div class="card-footer" style="background: inherit; border-color: inherit;">

										<a href="<?php echo e(route('frontend.berita.detail',['slug'=>$berita->slug])); ?>" class="btn btn-secondary">Read more...</a>

									</div>

								</div>

								<!-- Copy until here -->

							</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						



			    </div>

			  </div>

			<div class="container" id="content-mobile">

				<div class="berita">

					<?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $front): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="box">

						<img src="<?php echo e(($front->img)?asset('backend/images/informasi/berita/'.$front->img):asset('backend/images/default.jpg')); ?>" width="100%" height="360px" style="object-fit:stretch">

							<div class="text">

								<h3><a href="<?php echo e(route('frontend.berita.detail',['slug'=>$front->slug])); ?>" class="f1-l-1"><?php echo e($front->title); ?></a></h3>

								<small class="f1-s-3">

									<i class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($front->created_at)->translatedFormat('l, d F Y')); ?>&nbsp;|

									<i class="fa fa-eye"></i>&nbsp;<?php echo e($front->hit); ?> Dilihat

								</small>

							</div>

					</div>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>

			</div>

          	<?php endif; ?>

		</div>



	</div>

</section>

<div class="line"></div>



<!-- Row Pengumuman Agenda-->

<section id="" class="my-3">

	<div class="container">

		<div class="row no-gutter">



			<!-- Pengumuman -->

			<div class="col-lg-6 col-md-6 col-sm-12">

				<div class="container">

					<h2 class="subjudul-home"><span class="span-judul"><a href="<?php echo e(route('frontend.pengumuman.list')); ?>">Pengumuman</a></span></h2>

					<?php if(count($pengumumans) == 0): ?>

						<h4 class="text-center py-2"><strong>Belum ada data</strong></h4>

					<?php else: ?>

					<?php $__currentLoopData = $pengumumans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengumuman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div>

						<div class="row no-gutter border my-2" style="border-radius:10px">

							<div class="col-md-4">

								<img style="height:100px;width:100%" class="img-list2 rounded" src="<?php echo e(($pengumuman->img)?asset('backend/images/informasi/pengumuman/'.$pengumuman->img):asset('backend/images/default.jpg')); ?>">

							</div>

							<div class="col-md-8 align-self-end">

								<div class="text-list2 py-1">

									<h5 class="pt-1">

										<a href="<?php echo e(route('frontend.pengumuman.detail',['slug'=>$pengumuman->slug])); ?>" class="f1-m-2">

											<?php echo e($pengumuman->title); ?>


										</a>

									</h5>

									<small class="f1-s-3">

										<i class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('l, d F Y')); ?>&nbsp;|&nbsp;

										<i class="fa fa-eye"></i>&nbsp;<?php echo e($pengumuman->hit); ?> Dilihat

									</small>

								</div>

							</div>

						</div>

					</div>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php endif; ?>

				</div>

			</div>

			<div class="line" id="content-mobile"></div>



			<!-- Agenda -->

			<div class="col-lg-6 col-md-6 col-sm-12">

				<div class="container">

					<h2 class="subjudul-home"><span class="span-judul"><a href="<?php echo e(route('frontend.agenda.list')); ?>">Agenda</a></span></h2>

					<?php

					$i = 1;

					?>

                  	<?php if(count($agendas) == 0): ?>

						<h4 class="text-center py-2"><strong>Belum ada data</strong></h4>

					<?php else: ?>

					<?php $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="card my-2">

							<div class="card-header">

									<div class="row ">

											<div class="col-lg-3 col-sm-3 py-0 my-0 pl-1 pr-1 d-flex justify-content-center align-items-center border rounded text-white shadow-sm">

													<div class="align-self-center text-center my-2">

														<center>

															<h2 class="py-0 my-0">

																	<strong><?php echo e(\Carbon\Carbon::parse($row->start_date)->translatedFormat('d')); ?></strong>

															</h2>

															<p class="py-0 my-0 f1-m-1">

																	<?php echo e(\Carbon\Carbon::parse($row->start_date)->translatedFormat('M y')); ?>


															</p>

														</center>

													</div>

											</div>

											<div class="col-lg-9 col-sm-9">

												<div class="container">

													<small class="text-white">

														<i class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y')); ?>&nbsp;|&nbsp;

														<i class="fa fa-eye"></i>&nbsp;<?php echo e($row->hit); ?> Dilihat

													</small>

													<div class="tablistjudul">

														<h5 class="judulagenda">

															<a data-toggle="collapse" href="#collapse-<?php echo e($i); ?>" aria-expanded="true" aria-controls="collapse-<?php echo e($i); ?>" id="heading-<?php echo e($i); ?>" class="d-block">

																<?php echo e($row->title); ?>


															</a>

														</h5>

													</div>

												</div>

											</div>

									</div>

							</div>

							<div id="collapse-<?php echo e($i); ?>" class="collapse" aria-labelledby="heading-<?php echo e($i); ?>">

									<div class="card-body">

											<table>

													<tr>

															<td valign="top"><i class="fa fa-map-marker-alt"></i></td>

															<td>&nbsp;</td>

															<td valign="top"><?php echo $row->address; ?></td>

													</tr>

											</table>

											<i class="fa fa-clock"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($row->start_date)->translatedFormat('h.i')); ?> - <?php echo e(\Carbon\Carbon::parse($row->end_date)->translatedFormat('h.i')); ?> WIB

											<br><i class="fa fa-calendar-alt"></i>&nbsp;

											<?php echo e(\Carbon\Carbon::parse($row->start_date)->translatedFormat('d F Y')); ?> - <?php echo e(\Carbon\Carbon::parse($row->end_date)->translatedFormat('d F Y')); ?>


											<table>

													<tr>

															<td valign="top"><i class="fa fa-sticky-note"></i></td>

															<td>&nbsp;</td>

															<td valign="top"><?php echo $row->description; ?></td>

													</tr>

											</table>

									</div>

									<div class="card-footer">

											<a href="<?php echo e(route('frontend.agenda.detail',['slug'=>$row->slug])); ?>" class="btn btn-secondary">More</a>

									</div>

							</div>

					</div>

					<?php

					$i++;

					?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  	<?php endif; ?>

				</div>

			</div>



		</div>

	</div>

</section>

<div class="line"></div>



<!-- Row Galeri-->

<section id="" class="my-3">

	<div class="container">

		<div class="row no-gutter">

			<!-- Video -->

			<div class="col-lg-6 col-md-6 col-sm-12">

				<div class="container">

					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Video</a></span></h2>

                  	<?php if(count($videos) == 0): ?>

						<h4 class="text-center py-2"><strong>Belum ada data</strong></h4>

					<?php else: ?>

					<div class="sld-wrp">

					  <div class="slider-for">

                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					    <div class="slide-container">

							<iframe height="100%" width="100%" frameborder="0" src="<?php echo e(str_replace('watch?v=','embed/',$video->url)); ?>"></iframe>

						</div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					  </div>

					  <div class="slider-nav">

                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					    <div class="slide-list"><img class="my-2" src="<?php echo e(($video->img)?asset('backend/images/galeri/video/'.$video->img):asset('backend/images/default.jpg')); ?>"></div>

					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					  </div>

					</div>

                  	<?php endif; ?>

				</div>

			</div>

			<div class="line" id="content-mobile"></div>



			<!-- Foto -->

			<div class="col-lg-6 col-md-6 col-sm-12">

				<div class="container">



					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Foto</a></span></h2>

                    <?php if(count($fotos) == 0): ?>

						<h4 class="text-center py-2"><strong>Belum ada data</strong></h4>

					<?php else: ?>

                  

							<div id="content-desktop">

								<div class="row gallery">

									<?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<div class="col-lg-4 col-md-4 col-xs-6 item zoom-on-hover">

											<a href="<?php echo e(asset('backend/images/galeri/foto/'.$foto->img)); ?>" class="lightbox rounded">

													<img src="<?php echo e(asset('backend/images/galeri/foto/'.$foto->img)); ?>" class="gambar" >

											</a>

									</div>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</div>

							</div>



							<div id="content-mobile">



										<div class="row gallery">

											<div class="col">

													<div class="berita">

														<?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

														<div class="box">

												    	<img src="<?php echo e(asset('backend/images/galeri/foto/'.$foto->img)); ?>" width="100%" height="260px" style="object-fit:stretch">

												        <div class="text">

												          <h3><a href="<?php echo e(asset('backend/images/galeri/foto/'.$foto->img)); ?>" class="lightbox f1-l-1"><?php echo e($foto->title); ?></a></h3>

																	<small class="f1-s-3">

																		<i class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($foto->created_at)->translatedFormat('l, d F Y')); ?>


																	</small>

												        </div>

												    </div>

														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</div>

											</div>

										</div>



							</div>

                  	<?php endif; ?>

				</div>

			</div>



		</div>

	</div>

</section>

<div class="line"></div>



<!-- Row Link -->

<section id="" class="my-3">



</section>



<?php $__env->stopSection(); ?>







<?php $__env->startSection('top-resource'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/compact-gallery.css')); ?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/baguetteBox.min.css')); ?>"/>

<!-- Slick -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick.css')); ?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick-theme.css')); ?>"/>

<style media="screen">



#slideshow .slick div > img {

	width: 100%;

	height: 420px;

	object-fit: fill;

  position: relative;

}



.box{

        position: relative;

        display: inline-block; /* Make the width of box same as image */

    }



.box .text{

        position: absolute;

        z-index: 999;

        margin: 0 auto;

        left: 0;

        right: 0;

        text-align: center;

        bottom: 5%; /* Adjust this value to move the positioned div up and down */

        background: rgba(0, 0, 0, 0.8);

        font-family: Arial,sans-serif;

        color: #fff;

        width: 100%; /* Set the width of the positioned div */

    }



.logo-holder{

  width: auto;

  /* height: 350px; */

	height: auto;

  background: transparent;

  color: white;

	text-shadow: 2px 2px 6px #444;

	-webkit-text-stroke: 1px black;

  position: absolute;

  top: 20px;

  left: 25px;

  z-index:5;

}



.sld-wrp {

  width: 100%;

  margin: 0 auto;

}



.slider-for {

  width: auto;

  margin: 0 auto;

  position: relative;

  z-index: 10;

}



.slide-container {

  height: 40vh;

  background-color: #fff;

  text-align: center;

  /* line-height: 40vh;

  font-size: 40px;

  font-weight: bold;

  margin-bottom: 20px; */

	/* border: 1px solid #000;

  box-sizing: border-box; */

}

.slide-container > iframe {

	object-fit: stretch;

}

.slide-btn {

  text-align: center;

  /* box-sizing: border-box; */

  padding: 20px;

  background-color: #6c757d;

  border: 1px solid #000;

  cursor: pointer;

}

.slide-btn:hover {

  background-color: #263238;

	color: #fff;

}

.slide-list{

	padding: 0 auto;

	display: flex;

	height: 110px;

}

.slide-list > img{

	object-fit: stretch;

	padding-left: 5px;

	padding-right: 5px;

	width: 100%;

	height: 100%;

}



.card-custom {

  overflow: hidden;

  min-height: 450px;

  box-shadow: 0 0 6px rgba(10, 10, 10, 0.3);

}



.card-custom-img {

  height: 200px;

  min-height: 200px;

  background-repeat: no-repeat;

  background-size: cover;

  background-position: center;

  border-color: inherit;

}



/* First border-left-width setting is a fallback */

.card-custom-img::after {

  position: absolute;

  content: '';

  top: 161px;

  left: 0;

  width: 0;

  height: 0;

  border-style: solid;

  border-top-width: 40px;

  border-right-width: 0;

  border-bottom-width: 0;

  border-left-width: 545px;

  border-left-width: calc(575px - 5vw);

  border-top-color: transparent;

  border-right-color: transparent;

  border-bottom-color: transparent;

  border-left-color: inherit;

}



.card-custom-avatar img {

  border-radius: 50%;

  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);

  position: absolute;

  top: 100px;

  left: 1.25rem;

  width: 100px;

  height: 100px;

}



</style>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('bottom-resource'); ?>

<script src="<?php echo e(asset('frontend/js/baguetteBox.min.js')); ?>" charset="utf-8"></script>

<script>

window.addEventListener('load', function() {

  baguetteBox.run('.gallery');

});

</script>



<script>

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');

</script>



<script type="text/javascript" src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>

<script type="text/javascript">

$('#slideshow .slick').slick({

	autoplay: true,

	dots: false,

	fade: false,

	infinite: true,

	adaptiveHeight: false,

	loop: true,

	swipe: true

});

</script>



<script type="text/javascript">

$('.berita').slick({

	autoplay: true,

	dots: false,

	fade: false,

	infinite: true,

	loop: true,

	swipe: true

});



$('.slider').slick({

	dots: false,

	arrows: false,

	vertical: true,

	slidesToShow: 4,

	slidesToScroll: 1,

	verticalSwiping: true,

});

</script>



<script type="text/javascript">



$('.slider-for').slick({

  slidesToShow: 1,

  slidesToScroll: 1,

  arrows: false,

  fade: true,

	adaptiveHeight: false,

  asNavFor: '.slider-nav'

});



$('.slider-nav').slick({

  slidesToShow: 3,

  slidesToScroll: 1,

  asNavFor: '.slider-for',

  dots: false,

  centerMode: true,

  focusOnSelect: true

});



</script>



<script type="text/javascript">

$('.sliderberita').slick({

	autoplay: true,

	dots: false,

	arrows: false,

	slidesToShow: 3,

	slidesToScroll: 1,

	loop: true,

	infinite: true,

  centerMode: false,

	adaptiveHeight: false

});

</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/home.blade.php ENDPATH**/ ?>