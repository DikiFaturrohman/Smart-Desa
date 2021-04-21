<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header">
        <h3>Smart Desa dan Kelurahan</h3>
    </div>
    <ul class="list-unstyled components">
        <p class="f1-l-1"><u>{{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}
                {{ucwords(strtolower($lokasi->nama))}}</u></p>
        <li class="{{ Request::routeIs('frontend.profil.*') ? 'active' : '' }}">
            <a href="#profil" data-toggle="collapse" aria-expanded="false">Profil
                {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
            <ul class="collapse list-unstyled" id="profil">
                <li>
                    <a href="{{route('frontend.profil.sejarah')}}">Sejarah
                        {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
                </li>
                <li>
                    <a href="{{route('frontend.profil.visimisi')}}">Visi Misi</a>
                </li>
                <li>
                    <a href="{{route('frontend.profil.gambaranumum')}}">Gambaran Umum
                        {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
                </li>
                <li>
                    <a href="{{route('frontend.profil.geografis')}}">Kondisi Geografis</a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::routeIs('frontend.potensi.*') ? 'active' : '' }}">
            <a href="#potensi" data-toggle="collapse" aria-expanded="false">Potensi
                {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
            <ul class="collapse list-unstyled" id="potensi">
                @foreach($potensi as $list)
                <li>
                    <a href="{{route('frontend.potensi.list', $list->slug)}}">{{$list->name}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ Request::routeIs('frontend.program.*') ? 'active' : '' }}">
            <a href="#program" data-toggle="collapse" aria-expanded="false">Program
                {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
            <ul class="collapse list-unstyled" id="program">
                @foreach($program as $list)
                <li>
                    <a href="{{route('frontend.program.list', $list->slug)}}">{{$list->name}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="{{ Request::routeIs('frontend.pemdes.*') ? 'active' : '' }}">
            <a href="#pemdes" data-toggle="collapse" aria-expanded="false">Pemerintah
                {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
            <ul class="collapse list-unstyled" id="pemdes">
                <li>
                    <a href="{{route('frontend.pemdes.kades')}}">Kepala
                        {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
                </li>
                <li>
                    <a href="{{route('frontend.pemdes.perangkat')}}">Perangkat
                        {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
                </li>
                <li>
                    <a href="{{route('frontend.pemdes.kantor')}}">Kantor
                        {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</a>
                </li>
                <li>
                    <a href="{{route('frontend.pemdes.struktur')}}">Struktur Organisasi</a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::routeIs('frontend.bumdes.*') ? 'active' : '' }}">
            <a href="#bumdes" data-toggle="collapse" aria-expanded="false">BUMDES</a>
            <ul class="collapse list-unstyled" id="bumdes">
                <li>
                    <a href="{{route('frontend.bumdes.profil')}}">Profil BUMDES</a>
                </li>
                <li>
                    <a href="{{route('frontend.bumdes.produk')}}">Produk BUMDES</a>
                </li>
            </ul>
        </li>
        @if(Auth::guard('masyarakat')->check())
        <li class="{{ Request::routeIs('frontend.unggah*') ? 'active' : '' }}">
            <a href="{{route('frontend.unggah')}}">Unggah Dokumen</a>
        </li>
        <li class="{{ Request::routeIs('frontend.listprogress*') ? 'active' : '' }}">
            <a href="{{route('frontend.listprogress')}}">Progres</a>
        </li>
        <li class="{{ Request::routeIs('frontend.changePassword*') ? 'active' : '' }}">
            <a href="{{route('frontend.changePassword')}}">Ubah Password</a>
        </li>
        <li class="{{ Request::routeIs('frontend.logout*') ? 'active' : '' }}">
            <a href="{{route('frontend.logout')}}">Logout</a>
        </li>
        @else
        <li class="{{ Request::routeIs('frontend.login*') ? 'active' : '' }}">
            <a href="{{route('frontend.login')}}">Login</a>
        </li>
        <li class="{{ Request::routeIs('frontend.register*') ? 'active' : '' }}">
            <a href="{{route('frontend.register')}}">Register</a>
        </li>
        @endif
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i> Cari</a>
        </li>
    </ul>
</nav>
