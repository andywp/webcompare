@include('header') 

<?php
	$value=$data->memory_value.','.$data->cpu_speed.','.$data->fitur;

?>



<script>
	var label ='{{ $data->paket }}';
</script>



    <section class="section section-hosting section-compare pt-5 pb-5" >
    <div class="container">
		<h2 class="heading-title text-center"> Cloud Hosting Indonesia Terbaik untuk Anda </h2>
		<div class="compare-content mb-5 ">
			<div class="row d-flex justify-content-center">
				<div class="col-sm-4  col-12 relative">
					<div class="box-hosting">
						<div class="box-head"></div>
						<div class="box-body pt-3 pb-3">
							<img src="{{asset('img/unlimited-hosting-indonesia-terbaik-small.png')}}" class="rounded mx-auto d-block" alt="...">
						</div>
						<div class="box-title">
							<h3 class="heading-title text-center">{{ $data->paket }}</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="compare-chart">
			 <nav>
                <div class="nav nav-tabs nav-fill mt-5" id="nav-tab" role="tablist">
                   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
				  		 {{ $data->paket }}
					</a>
                </div>
            </nav>
			<!--- compare chart detail-->
			<div class="compare-tabs-detail">
				<div class="row">
					<div class="col-12 col-lg-6 ">
						<div class="chart-container mt-5">
							<canvas id="chartspek" ></canvas>
						</div>
					</div>
					<div class="col-12 col-lg-6 ">
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<div class="text-detail">
									<h4 class="heading-title" >Mengapa {{ $data->paket }} lenih baik dari rata-rata? </h4>
									<div class="media media-comapre">
										<span class="mr-3 mt-2" ><i class="fas fa-check"></i></span>
									  <div class="media-body">
										<h5 class="mt-0 heading-title">Kapasitas Memori</h5>
											{{$fitur->RAM }}
									  </div>
									</div>
									<div class="media media-comapre">
										<span class="mr-3 mt-2" ><i class="fas fa-check"></i></span>
									  <div class="media-body">
										<h5 class="mt-0 heading-title">CPU</h5>
										{{$fitur->CPU_core}}
									  </div>
									</div>
									<div class="media media-comapre">
										<span class="mr-3 mt-2" ><i class="fas fa-check"></i></span>
									  <div class="media-body">
										<h5 class="mt-0 heading-title">Storage</h5>
											{{$fitur->storage }}
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!--detail -->
	<?php
	//adodb_pr($fitur); 
	$bandwidth=($fitur->bandwidth == 'Unmetered')?'100%':$fitur->bandwidth;
	//$storageBar=;
	$max_email='max_email/hour';
	$Addon='Addon/Parked';
	?>
	<div class="featured-post-area">
        <div class="container">
            <div class="cards-featured">
				<div class=" mb-2 kb-title">
					Featured
				</div>
               <!--  <div class="row">
                    <div class="col-md-7">
                        <div class=" mb-2 kb-title">
                            Featured
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="animation-btn sm-res-mg-t-10 tb-res-mg-t-10 dk-res-mg-t-10">
                            <button class="btn ant-nk-st zoomInDown-ac waves-effect">Show More</button>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Hosting</h2>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="media media-fitur">
									<span class="mr-3"><i class="fas fa-check"></i></span>
									<div class="media-body recent-post-it-ctn">
										<h6 class="mt-0 ">{{ $data->paket }}</h6>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Storage</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->storage }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= storageBar($fitur->storage) ?>%" style="width: <?= storageBar($fitur->storage) ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Bandwidth</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->bandwidth }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= $bandwidth ?>" style="width: <?= $bandwidth ?>;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
					<!-- Ram -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Ram</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->RAM }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= ramBar($fitur->RAM) ?>%" style="width: <?=  ramBar($fitur->RAM) ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
					
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>CPU</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->CPU_core }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= cpuBar($fitur->CPU_core) ?>%" style="width: <?=  cpuBar($fitur->CPU_core) ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
					
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Entry Proses</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->entry_proses }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= $fitur->entry_proses ?>%" style="width: <?=  $fitur->entry_proses?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Inodes</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->Inodes }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= inodes($fitur->Inodes) ?>%" style="width: <?= inodes($fitur->Inodes) ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>PHP Memory</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->PHP_memory }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= php_memory($fitur->PHP_memory) ?>%" style="width: <?= php_memory($fitur->PHP_memory)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Database</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->database }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= $fitur->database ?>%" style="width: <?= $fitur->database  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Akun Email</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->akun_email }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=akunEmail($fitur->akun_email) ?>%" style="width: <?= akunEmail($fitur->database)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Max email/hour</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->$max_email }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=max_email($fitur->$max_email) ?>%" style="width: <?= max_email($fitur->$max_email)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Akun FTP</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->akun_FTP }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=akun_FTP($fitur->akun_FTP) ?>%" style="width: <?= akun_FTP($fitur->akun_FTP)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Addon / Parked</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->$Addon }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=addons($fitur->$Addon) ?>%" style="width: <?= addons($fitur->$Addon)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Domain</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->domain }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=domainCart($fitur->domain) ?>%" style="width: <?= domainCart($fitur->domain)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Subdomain</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->subdomain }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=subdomainCart($fitur->subdomain) ?>%" style="width: <?= subdomainCart($fitur->subdomain)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>SSL</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->SSL }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=domainCart($fitur->SSL) ?>%" style="width: <?= domainCart($fitur->SSL)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
					
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Spam filter</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->spam_filter }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?=domainCart($fitur->spam_filter) ?>%" style="width: <?= domainCart($fitur->spam_filter)  ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 space-card">
                        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                            <div class="recent-post-ctn">
                                <div class="recent-post-title">
                                    <div class="vx-card__header">
                                        <h2>Remote MySQL</h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post-items">
								<div class="recent-post-items">
									<div class="media media-fitur">
										<!-- <span class="mr-3"><i class="fas fa-check"></i></span> -->
										<div class="media-body recent-post-it-ctn skill">
											<p class="mt-0 mb-0 ">{{ $fitur->remote_MySQL }}</p>
											<div class="progress">
												<div class="progress-bar wow fadeInLeft" data-progress="<?= ($fitur->remote_MySQL=='No')?0:100;   ?>%" style="width: <?= ($fitur->remote_MySQL=='No')?0:100;   ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
												</div>
											</div>
										</div>
									</div>
								</div> 
                            </div>
                        </div>
					</div>
                   
                </div>
            </div>
           
        </div>
    </div>




</section>
<!----- produk --------------->
<?php
	adodb_pr($data);
	adodb_pr($produk);

	$selectONE='';
	foreach($produk as $r){

		$selected=($r->id == $data->id)?'selected':'';
		$selectONE.='<option value="'.$r->id.'" '.$selected.' >'.$r->paket.'</option>';
	}


?>



<div class="box-btn-compare">
	<button id="modalActivate" class="btn btn-orange" data-toggle="modal" data-target="#exampleModalPreview" ><i class="fas fa-plus"></i> Add Compare  </button>
</div>

<!-- Modal -->
<div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
   <form method="POST" id="add_compare">
	<div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Add Compare</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-8 col-sm-10">
							<select name="copare[]" class="selectpicker form-control" style="width:100%">
								<?= $selectONE ?>
							</select>
						</div>
						<div class="col-4 col-sm-2">
							<button ><i class="fas fa-trash-alt"></i></button>
						</div>
					</div>
				</div>


			
            </div>
            <div class="modal-footer-full-width  modal-footer">
				<button type="submit" class="btn btn-primary btn-md btn-rounded">Save changes</button>
                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
            </div>
        </div>
	</div>
	</from>
</div>

@include('footer')
<script>
		
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};
		//console.log(Chart.helpers.color);
		var color = Chart.helpers.color;
		var config = {
			type: 'radar',
			data: {
				labels: [['Memories'], ['Speed'], ['Storage']],
				datasets: [{
					label: '',
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [{{$value}}]
				}] 
			},
			options: {
				legend: {
					display: false,
				},
				title: {
					display: false,
					text: 'Chart.js Radar Chart'
				},
				scale: {
					ticks: {
						display: false,
						beginAtZero: true
					}
				}
			}
		};

		window.onload = function() {
			window.myRadar = new Chart(document.getElementById('chartspek'), config);
		};
    </script> 