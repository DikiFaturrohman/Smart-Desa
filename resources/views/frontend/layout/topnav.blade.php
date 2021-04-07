<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center sticky-top">

    <div class="container-fluid">



					<button type="button" id="sidebarCollapse" class="btn btn-secondary" >

                        <i class="fas fa-align-left"></i>

                        <span>Menu</span>

                    </button>

					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                        <i class="fas fa-align-justify"></i>

                    </button>

					<!-- <h2 id="content-desktop" class="pl-3 align-self-center"><img height="60%" src="https://subang.go.id/public/frontend/img/logoweb.png"></h2> -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                      <div class="line" id="content-mobile"></div>

                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item {{ Request::routeIs('frontend.home') ? 'active' : '' }}">

                                <a class="nav-link pl-2" href="{{route('frontend.home')}}">Beranda</a>

                            </li>

							<li class="nav-item dropdown {{ Request::routeIs('frontend.suket.*') ? 'active' : '' }}">

                                <a class="nav-link pl-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan Administrasi</a>

                                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->

                                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">

                                  <a class="dropdown-item" href="{{route('frontend.suket.kematian')}}">Surat Keterangan Kematian</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.usaha')}}">Surat Keterangan Usaha</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.bedanama')}}">Surat Keterangan Beda Nama</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.tidakMampu')}}">Surat Keterangan Tidak Mampu</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.penghasilan')}}">Surat Keterangan Penghasilan</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.status')}}">Surat Keterangan Status Pernikahan</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.tanah')}}">Surat Keterangan Riwayat Tanah</a>

                                  <a class="dropdown-item" href="{{route('frontend.skl')}}">Surat Keterangan Kelahiran</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.ahliwaris')}}">Surat Keterangan Ahli Waris</a>

                                  <a class="dropdown-item" href="{{route('frontend.suket.sapujagad')}}">Surat Keterangan Lain</a>

                                  <div class="dropdown-divider"></div>

                                  <a class="dropdown-item" href="{{route('frontend.listprogress')}}">Lihat Progress Pemohon</a>

                                </div>

                            </li>

                            <li class="nav-item {{ Request::routeIs('frontend.berita.*') ? 'active' : '' }}">

                                <a class="nav-link pl-2" href="{{route('frontend.berita.list')}}">Berita</a>

                            </li>

                            <li class="nav-item {{ Request::routeIs('frontend.infografis') ? 'active' : '' }}">

                                <a class="nav-link pl-2" href="{{route('frontend.infografis')}}">Info Grafis</a>

                            </li>

                            <li class="nav-item dropdown {{ Request::routeIs('frontend.foto.*') || Request::routeIs('frontend.video.*') ? 'active' : '' }}">

                                <a class="nav-link pl-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Galeri</a>

                                <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->

                                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">

                                  <a class="dropdown-item" href="{{route('frontend.foto.list')}}">Foto</a>

                                  <a class="dropdown-item" href="{{route('frontend.video.list')}}">Video</a>


                                </div>

                            </li>

							              <li class="nav-item {{ Request::routeIs('frontend.download.list') ? 'active' : '' }}">

                                <a class="nav-link pl-2" href="{{route('frontend.download.list')}}">Download</a>

                            </li>

							              <li class="nav-item {{ Request::routeIs('frontend.hubungikami') ? 'active' : '' }}">

                                <a class="nav-link pl-2" href="{{route('frontend.hubungikami')}}">Hubungi Kami</a>

                            </li>

                        </ul>

                    </div>

                </div>

</nav>

