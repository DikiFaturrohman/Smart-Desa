@extends('frontend.layout.app')

@section('title') {{$download->title}} @endsection

@section('meta')



@endsection



@section('header')

<header id="content-desktop">

	<section id="slideshow">

	  <div class="slick">

	  @if(count($slider) > 0)
            @foreach($slider as $list)
            <div>
                <img src="{{($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')}}" class="" alt="">
            </div>
            @endforeach
            @else
            <div>
                <img src="{{asset('frontend/img/background-header.png')}}" class="" alt="">
            </div>
            <div>
                <img src="{{asset('frontend/img/background-header2.png')}}" class="" alt="">
            </div>
            <div>
                <img src="{{asset('frontend/img/background-header3.png')}}" class="" alt="">
            </div>
            @endif

	  </div>

	</section>

	<div class="logo-holder">

		<img src="{{asset('frontend/img/logoweb.png')}}" alt="">

		<h2 class="pl-5 ml-2 f1-l-1">{{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($lokasi->nama))}} Kecamatan
            {{ucwords(strtolower($lokasi->kecamatan->nama))}}</h2>
  </div>

</header>

@endsection



@section('content')

	<div class="row py-2 my-2">

		<!-- main -->

		<div class="col-lg-8 col-md-6">

			<!-- content -->

				<div class="container pl-4">

					<!-- Blog Detail -->

						<div class="pb-4">



							<h3 class="f1-l-3 cl2 p-b-15 respon2">

								{{$download->title}}

							</h3>





							<div class="p-b-10">
								<span class="f1-s-3 m-r-15">
									<span>
										<i class="fa fa-user"></i> {{$download->created_by}} |&nbsp;
									</span>
									<span>
										<i class="fa fa-calendar-alt"></i> {{\Carbon\Carbon::parse($download->created_at)->translatedFormat('d F Y')}} |&nbsp;
									</span>
									<span>
										<i class="fa fa-eye"></i> {{$download->hit}} Dilihat |&nbsp;
									</span>
									<span>
										<i class="fa fa-comment"></i> 0 Komentar
									</span>
								</span>
							</div>
							<iframe src="{{asset('backend/files/dokumen/download/'.$download->file)}}" width="100%" height="600px"></iframe>
						</div>

							<p class="f1-s-11 cl6 p-b-25">

								{!! $download->description !!}

							</p>

							<a href="{{asset('backend/files/dokumen/download/'.$download->file)}}" class="btn btn-gelap"><i class="fas fa-download"></i>Unduh</a>
							<hr>

						<!-- Leave a comment -->

						<!-- <div class="pb-2 mb-2">

							<h4 class="f1-l-4 pb-2">

								Leave a Comment

							</h4>

							<form>

								<div class="row pb-2">

									<textarea rows="4" class="form-control bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Komentar"></textarea>

								</div>

								<div class="row">

									<div class="col-md-6">

										<div class="input-group mb-3 mr-2 pr-1">

		                    <div class="input-group-prepend">

		                        <span class="input-group-text"><i class="fa fa-user"></i></span>

		                    </div>

		                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">

		                </div>

									</div>

									<div class="col-md-6">

										<div class="input-group mb-3 mr-2">

		                    <div class="input-group-prepend">

		                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>

		                    </div>

		                    <input type="email" class="form-control" placeholder="Email" nainformasil">

		                </div>

									</div>

								</div>

								<button class="btn btn-secondary size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">

									Post Comment

								</button>

							</form>

						</div>

						<hr>

						<div class="p-t-20">

								<div class="card">

									<div class="card-body">

										<div class="row">

											<div class="col-md-2">

												<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>

												<p class="text-secondary text-center f1-s-5">15 Minutes Ago</p>

											</div>

											<div class="col-md-10 pl-3 pr-1">

												<p class="d-flex justify-content-between">

													<a class="pt-0 mt-0" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>

													<span class="f1-s-3"><i class="fa fa-calendar-alt"></i>&nbsp;17 Jan 2020</span>

											   </p>

											   <div class="clearfix"></div>

												<p class="p-t-10 cl4 f1-s-1">Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and Selengkapnya recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>



												<div class="dialogbox">

													<div class="body">

													  <span class="tip tip-up"></span>

													  <div class="message">

														<p class="cl5 small p-t-5 p-b-5">

															<i class="fa fa-user"></i> Admin<br>

															<i class="fa fa-calendar-alt"></i> 18 Jan 2020

														</p>

														<p class="cl4 f1-s-1">I just made a comment about this comment box which is this message is send by the admin to reply the message. </p>

													  </div>

													</div>

												</div>

											</div>

										</div>

									</div>

								</div>

						</div>
 -->
				</div>

				<div class="line" id="content-mobile"></div>

		</div>

		<!-- aside -->
		<div class="col-lg-4 col-md-6">
			<div class="container">
					<!-- agenda pengumuman -->
					<div class="card pb-1 mb-4 shadow-sm">
							<div class="card-header">
									<ul class="nav nav-tabs card-header-tabs" id="side-list" role="tablist">
											<li class="nav-item">
													<a class="nav-link active" href="#pengumuman" role="tab" aria-controls="pengumuman"
															aria-selected="true">Pengumuman</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="#agenda" role="tab" aria-controls="agenda"
															aria-selected="false">Agenda</a>
											</li>
									</ul>
							</div>
							<div class="card-body">
									<div class="tab-content mt-3">
											<!-- pengumuman -->
											<div class="tab-pane active" id="pengumuman" role="tabpanel">
													@if(count($pengumuman)>0)
													@foreach($pengumuman as $tabpengumuman)
													<div class="sidelist shadow">
															<div class="row">
																	<div class="col-md-4 img-container">
																			<img class="img-to-fit" width="100%"
																					src="{{($tabpengumuman->img)?asset('backend/images/informasi/pengumuman/'.$tabpengumuman->img):asset('backend/images/default.jpg')}}"
																					alt="{{($tabpengumuman->title)}}" />
																	</div>
																	<div class="col-md-7 px-2 py-2">
																			<small class="f1-s-3">
																					<i
																							class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabpengumuman->created_at)->translatedFormat('l, d F Y')}}&nbsp;|&nbsp;
																					<i class="fa fa-eye"></i>&nbsp;{{$tabpengumuman->hit}} Dilihat
																			</small>
																			<h5 class="pt-1">
																					<a href="{{route('frontend.pengumuman.detail',['slug'=>$tabpengumuman->slug])}}"
																							class="">
																							{{$tabpengumuman->title}}
																					</a>
																			</h5>
																	</div>
															</div>
													</div>
													@endforeach
													@else
													<center>
															<strong>Belum ada data</strong>
													</center>
													@endif
											</div>
											<!-- agenda -->
											<div class="tab-pane" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
													<div class="row">
															<div class="col-lg-12 col-sm-12 mb-2 ">
																	<div class="row py-1">
																			<div class="col-md-12 col-sm-12">
																					@php
																					$i = 1;
																					@endphp
																					@if(count($agenda)>0)
																					@foreach($agenda as $tabagenda)
																					<div class="card mb-1">
																							<div class="card-header">
																									<div class="row ">
																											<div
																													class="col-sm-3 py-0 my-0 pl-1 pr-1 d-flex justify-content-center align-items-center border rounded text-white shadow-sm">
																													<div class="align-self-center text-center my-2">
																															<center>
																																	<h2 class="py-0 my-0">
																																			<strong>{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d')}}</strong>
																																	</h2>
																																	<p class="py-0 my-0 f1-m-1">
																																			{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('M y')}}
																																	</p>
																															</center>
																													</div>
																											</div>
																											<div class="col-sm-9">
																													<div class="container">
																															<small class="text-white">
																																	<i
																																			class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabagenda->created_at)->translatedFormat('d F Y')}}&nbsp;|&nbsp;
																																	<i class="fa fa-eye"></i>&nbsp;{{$tabagenda->hit}}
																																	Dilihat
																															</small>
																															<div class="tablistjudul">
																																	<h5 class="judulagenda">
																																			<a data-toggle="collapse"
																																					href="#agenda-{{$i}}" aria-expanded="true"
																																					aria-controls="agenda-{{$i}}"
																																					id="head-{{$i}}" class="d-block">
																																					{{$tabagenda->title}}
																																			</a>
																																	</h5>
																															</div>
																													</div>
																											</div>
																									</div>
																							</div>
																							<div id="agenda-{{$i}}" class="collapse"
																									aria-labelledby="head-{{$i}}">
																									<div class="card-body">
																											<table>
																													<tr>
																															<td valign="top"><i class="fa fa-map-marker-alt"></i>
																															</td>
																															<td>&nbsp;</td>
																															<td valign="top">{!!$tabagenda->address!!}</td>
																													</tr>
																											</table>
																											<i
																													class="fa fa-clock"></i>&nbsp;{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('h.i')}}
																											-
																											{{\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('h.i')}}
																											WIB
																											<br><i class="fa fa-calendar-alt"></i>&nbsp;
																											{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d F Y')}}
																											-
																											{{\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('d F Y')}}
																											<table>
																													<tr>
																															<td valign="top"><i class="fa fa-sticky-note"></i></td>
																															<td>&nbsp;</td>
																															<td valign="top">{!!$tabagenda->description!!}</td>
																													</tr>
																											</table>
																									</div>
																									<div class="card-footer">
																											<a href="{{route('frontend.agenda.detail',['slug'=>$tabagenda->slug])}}"
																													class="btn btn-secondary">More</a>
																									</div>
																							</div>
																					</div>
																					@php
																					$i++;
																					@endphp
																					@endforeach
																					@else
																					<center>
																							<strong>Belum ada data</strong>
																					</center>
																					@endif
																			</div>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div>
					</div>
					<!-- berita artikel -->
					<div class="card pb-1 mb-4 shadow-sm">
							<div class="card-header">
									<ul class="nav nav-tabs card-header-tabs" id="side-list2" role="tablist">
											<li class="nav-item">
													<a class="nav-link active" href="#berita" role="tab" aria-controls="berita"
															aria-selected="true">Berita</a>
											</li>
									</ul>
							</div>
							<div class="card-body">
									<div class="tab-content mt-3">
											<!-- berita -->
											<div class="tab-pane active" id="berita" role="tabpanel">
													@if(count($berita)>0)
													@foreach($berita as $tabberita)
													<div class="sidelist shadow">
															<div class="row">
																	<div class="col-md-4 img-container">
																			<img class="img-to-fit" width="100%"
																					src="{{($tabberita->img)?asset('backend/images/informasi/berita/'.$tabberita->img):asset('backend/images/default.jpg')}}"
																					alt="{{($tabberita->title)}}" />
																	</div>
																	<div class="col-md-7 px-2 py-2">
																			<small class="f1-s-3">
																					<i
																							class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabberita->created_at)->translatedFormat('l, d F Y')}}&nbsp;|&nbsp;
																					<i class="fa fa-eye"></i>&nbsp;{{$tabberita->hit}} Dilihat
																			</small>
																			<h5 class="pt-1">
																					<a href="{{route('frontend.berita.detail',['slug'=>$tabberita->slug])}}"
																							class="">
																							{{$tabberita->title}}
																					</a>
																			</h5>
																	</div>
															</div>
													</div>
													@endforeach
													@else
													<center>
															<strong>Belum ada data</strong>
													</center>
													@endif
											</div>
									</div>
							</div>
					</div>
			</div>
		</div>

	</div>

@endsection



@section('top-resource')

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style media="screen">

#slideshow .slick div > img {

	width: 100%;

	height: 380px;

	object-fit: cover;

  position: relative;

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

</style>

@endsection

@section('bottom-resource')

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">

$('#slideshow .slick').slick({

	autoplay: true,

	dots: false,

	fade: true,

	infinite: true,

	adaptiveHeight: true,

	swipe: true

});

</script>

<script type="text/javascript">

$('#side-list a').on('click', function (e) {

e.preventDefault()

$(this).tab('show')

});

$('#side-list2 a').on('click', function (e) {

e.preventDefault()

$(this).tab('show')

});

</script>

@endsection

