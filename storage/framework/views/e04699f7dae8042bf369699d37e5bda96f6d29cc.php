<section class="py-0 my-0">
	<div class="container-fluid line-footerdark"></div>
</section>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-4 px-1">
				<h6 style="display:none">Profil</h6>
				<p class="text-white">
					<table class="text-white">
            <?php if(count($profile) > 0): ?>
            <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
						<tr>
							<td valign="top">
								<i class="fa fa-home"></i>
							</td>
							<td valign="top">&nbsp;</td>
							<td valign="top"><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?> <?php echo e($profil->nama); ?></td>							
							</tr>
							<tr>
								<td valign="top">
									<i class="fa fa-map-marker-alt"></i>
								</td>
								<td valign="top">&nbsp;</td>
								<td valign="top"><?php echo strip_tags($profil->alamat); ?></td>
							</tr>
							<tr>
								<td valign="top">
									<i class="fa fa-phone"></i>
								</td>
								<td valign="top">&nbsp;</td>
								<td valign="top"><?php echo e($profil->no_telpon); ?></td>
							</tr>
							<tr>
								<td valign="top">
									<i class="fa fa-envelope"></i>
								</td>
								<td valign="top">&nbsp;</td>
								<td valign="top"><?php echo e($profil->email); ?></td>
							</tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>          
						</table>
					</p>        			
                    
					<div class="line" id="content-mobile"></div>
				</div>
    			
				<div class="col-xs-6 col-lg-3 px-1">
					<h6>
						<strong>Statistik Pengunjung</strong>
					</h6>
					<table class="text-white">
						<tr>
							<td valign="top">
								<i class="fa fa-globe"></i>
							</td>
							<td valign="top" class="pl-1">Pengguna Online</td>
							<td valign="top" class="pl-1 pr-1">:</td>
							<td valign="top" class="pl-1"><?php echo e($userOnline); ?></td>
						</tr>
						<tr>
							<td valign="top">
								<i class="fa fa-user"></i>
							</td>
							<td valign="top" class="pl-1">Pengunjung Hari Ini</td>
							<td valign="top" class="pl-1 pr-1">:</td>
							<td valign="top" class="pl-1"><?php echo e($visitorToday); ?></td>
						</tr>
						<tr>
							<td valign="top">
								<i class="fa fa-users"></i>
							</td>
							<td valign="top" class="pl-1">Total Pengunjung</td>
							<td valign="top" class="pl-1 pr-1">:</td>
							<td valign="top" class="pl-1"><?php echo e($visitors); ?></td>
						</tr>
					</table>
					<div class="line" id="content-mobile"></div>
				</div>
    			<div class="col-xs-12 col-lg-2 px-1">
                	<h6>
						<strong>Didukung Oleh</strong>                    	
					</h6>                	
                    			<img src="https://img.icons8.com/ios-filled/100/000000/customer-support.png" class="img-fluid" >								                       	
        		</div>
				<div class="col-xs-6 col-lg-3 px-1">
					<h6>
						<strong>Quick Links</strong>
					</h6>
					<ul class="footer-links">
						<li>
							<a href="<?php echo e(route('frontend.pengumuman.list')); ?>">Pengumuman</a>
						</li>
						<li>
							<a href="<?php echo e(route('frontend.agenda.list')); ?>">Agenda</a>
						</li>
						<li>
							<a href="#">Sitemap</a>
						</li>
					</ul>
                	<a href="https://play.google.com/store/apps/details?id=id.go.subang.smartdesa"><img src="https://play.google.com/intl/en_us/badges/static/images/badges/id_badge_web_generic.png" alt="Get it on Google Play" class="img-fluid" width="60%" height="30%"></a>
				</div>
    			
    			</div>
			</div>
			<hr>
			
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<p class="copyright-text">Copyright &copy; 2020 Diskominfo Kabupaten Subang</p>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="social-icons">
							<li>
								<a href="#" class="facebook">
									<i class="fab fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#" class="twitter">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#" class="instagram">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>

<?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>