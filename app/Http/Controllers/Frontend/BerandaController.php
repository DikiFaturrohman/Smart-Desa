<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use PDF;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Download;
use App\Models\InfoGrafis;
use App\Models\ProfilDesa;
use App\Models\Pengumuman;
use App\Models\BukuTamu;
use App\Models\LogSuket;
use App\Models\Komentar;
use App\Models\PerangkatDesa;
use App\Models\StrukturOrganisasi;
use App\Models\Foto;
use App\Models\Video;
use App\Models\BumdesProfil;
use App\Models\BumdesProduk;
use App\Models\PotensiKategori;
use App\Models\PotensiList;
use App\Models\ProgramKategori;
use App\Models\ProgramList;
use App\Models\SKU;
use App\Models\SKP;
use App\Models\SKBN;
use App\Models\SKBNDetail;
use App\Models\SKAW;
use App\Models\SKRT;
use App\Models\SKSJ;
use App\Models\SKM;
use App\Models\SKK;
use App\Models\SKTM;
use DB;
use Session;
use App\Actions\ValidasiDokumenAction;

class BerandaController extends Controller



{


    public function home(){

      try{

        $data['beritas'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderBy('created_at','DESC')->limit(5)->get();

        $data['pengumumans'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderBy('created_at','DESC')->limit(5)->get();

        $data['agendas'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderBy('created_at','DESC')->limit(5)->get();

        $data['videos'] = Video::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderBy('created_at','DESC')->limit(10)->get();

        $data['fotos'] = Foto::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderBy('created_at','DESC')->limit(10)->get();

        return view ('frontend.home', $data);

        

        //$data['beritas'] = Berita::where('desa_id',Session::get('desa_id'))->limit(5)->orderBy('created_at','desc')->get();

        //$data['pengumumans'] = Pengumuman::where('desa_id',Session::get('desa_id'))->limit(5)->orderBy('created_at','desc')->get();

        //$data['agendas'] = Agenda::where('desa_id',Session::get('desa_id'))->limit(5)->where('start_date','>=',\Carbon\Carbon::now())->orderBy('start_date','asc')->get();

        //$data['videos'] = Video::where('desa_id',Session::get('desa_id'))->limit(5)->orderBy('created_at','desc')->get();

        //$data['fotos'] = Foto::where('desa_id',Session::get('desa_id'))->limit(6)->orderBy('created_at','desc')->get();

        //return view ('frontend.home', $data);

      }catch(\Exception $e){

        return back();

      }

    }







    public function agenda(){



      try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agendas'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);

          return view('frontend.agenda.list', $data);

      }catch(\Exception $e){

          return back();

      }

    }



    public function agendaDetail($slug){



      try{



        $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

        $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

        $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

        $agendas = Agenda::where('slug',$slug)->first();

        $data['agendas'] = $agendas;

        $data['komentar'] = $this->getComments($agendas->id,'agenda');

        $updateHit = Agenda::where('id', $agendas->id)->update(['hit'=> $agendas->hit + 1]);

        return view('frontend.agenda.detail', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    

    public function foto(){



      try{



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['foto'] = Foto::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->orderby('created_at', 'DESC')->paginate(10);



          return view('frontend.foto.list', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    public function fotoDetail($slug){



      try{



        $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $fotos = Foto::where('slug',$slug)->first();

        $data['foto'] = $fotos;

        $data['komentar'] = $this->getComments($fotos->id,'foto');

        $updateHit = Foto::where('id', $fotos->id)->update(['hit'=> $fotos->hit + 1]);

        return view('frontend.foto.detail', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    public function video(){



      try{



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['video'] = Video::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);



          return view('frontend.video.list', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    public function videoDetail($slug){



      try{



        $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



        $video = Video::where('slug',$slug)->first();

        $data['video'] = $video;

        $data['komentar'] = $this->getComments($video->id,'video');

        $updateHit = Video::where('id', $video->id)->update(['hit'=> $video->hit + 1]);

        return view('frontend.video.detail', $data);



      }catch(\Exception $e){



          return back();



      }



    }







    public function berita(){



      try{



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['beritas'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);



          return view('frontend.berita.list', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    public function beritaDetail($slug){



      try{



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $beritas =  Berita::where('slug',$slug)->first();

          $data['beritas'] = $beritas;



          $data['komentar'] = $this->getComments($beritas->id,'berita');



          $updateHit = Berita::where('id', $beritas->id)->update(['hit'=> $beritas->hit + 1]);

          return view('frontend.berita.detail', $data);



      }catch(\Exception $e){



          return back();



      }



    }







    public function pengumuman(){



      try{



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['pengumumans'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);



          return view('frontend.pengumuman.list', $data);



      }catch(\Exception $e){



          return back();



      }



    }



    public function pengumumanDetail($slug){



      try{



          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();



          $pengumumans = Pengumuman::where('slug',$slug)->first();

          $data['pengumumans'] = $pengumumans;



          $data['komentar'] = $this->getComments($pengumumans->id,'pengumuman');



          $updateHit = Pengumuman::where('id', $pengumumans->id)->update(['hit'=> $pengumumans->hit + 1]);

          return view('frontend.pengumuman.detail', $data);



      }catch(\Exception $e){



          return back();



      }



    }





    public function infografis(){

      try{

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['grafis'] = InfoGrafis::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);

          return view('frontend.infoGrafis.list', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

    public function infografisDetail($slug){

      try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $grafis = InfoGrafis::where('slug',$slug)->first();

          $data['grafis'] = $grafis;

          $data['komentar'] = $this->getComments($grafis->id,'infografis');

          $updateHit = InfoGrafis::where('id', $grafis->id)->update(['hit'=> $grafis->hit + 1]);

          return view('frontend.infoGrafis.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }



    public function download(){

      try{

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['download'] = Download::where('desa_id',Session::get('desa_id'))->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);

          return view('frontend.download.list', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

    public function downloadDetail($slug){

      try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $download = Download::where('slug',$slug)->first();

          $data['download'] = $download;

          $updateHit = Download::where('id', $download->id)->update(['hit'=> $download->hit + 1]);

          return view('frontend.download.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }


    public function bukuTamu(){
      return view ('frontend.bukuTamu');
    }
    public function kirim(Request $request){
      try{
        //dd($request->all());
        $rules = [
              'nama' => 'required',
              'email' => 'required',
              'telepon' => 'required',
              'subjek' => 'required',
              'pesan' => 'required'
        ];
        $messages = [
              'required' => ':attribute tidak boleh kosong',
              'unique' => ':attribute sudah digunakan',
              'size' => ':ukuran maksimal :size kb',
              'max' => ':attribute maksimal :max karakter'
        ];
        $label = [
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'subjek' => 'Subjek',
            'pesan' => 'Pesan'
        ];
        $this->validate($request, $rules, $messages, $label);

        $data = [
              'desa_id' => Session::get('desa_id'),
              'nama' => $request->input('nama'),
              'email' => $request->input('email'),
              'telepon' => $request->input('telepon'),
              'subjek' => $request->input('subjek'),
              'pesan' => $request->input('pesan')
        ];
        $bukutamu = BukuTamu::create($data);
        toastr()->success('Pesan telah dikirim','Sukses');
        return redirect()->route('frontend.bukutamu');
      }catch(\Exception $e){
        return redirect()->back();
      }
    }
    
    //profil desa

    public function visimisi(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->get();

          return view('frontend.profil.visimisi', $data);

      }catch(\Exception $e){

          return back();

      }

    }

    public function sejarah(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->get();

          return view('frontend.profil.sejarah', $data);

      }catch(\Exception $e){

          return back();

      }

    }

    public function gambaranumum(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->get();

          return view('frontend.profil.gambaranumum', $data);

      }catch(\Exception $e){

          return back();

      }

    }

    public function geografis(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->get();

          return view('frontend.profil.geografis', $data);

      }catch(\Exception $e){

          return back();

      }

    }



    public function bumdesProfil(){

      try{

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

		  $data['bumdes'] = BumdesProfil::where('desa_id',Session::get('desa_id'))->where('status','show')->orderby('created_at', 'DESC')->paginate(10);

          return view('frontend.bumdes.profil.list', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

    public function bumdesProfilDetail($slug){

      try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

					$profil = BumdesProfil::where('slug',$slug)->first();

          $data['profil'] = $profil;

          $data['komentar'] = $this->getComments($profil->id,'profil');

					$updateHit = BumdesProfil::where('id', $profil->id)->update(['hit'=> $profil->hit + 1]);

          return view('frontend.bumdes.profil.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

		public function bumdesProduk(){

      try{

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

					$data['bumdes'] = BumdesProduk::where('desa_id',Session::get('desa_id'))->where('status','show')->orderby('created_at', 'DESC')->paginate(10);

          return view('frontend.bumdes.produk.list', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

    public function bumdesProdukDetail($slug){

      try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

					$bumdes = BumdesProduk::where('slug',$slug)->first();

          $data['bumdes'] = $bumdes;

          $data['komentar'] = $this->getComments($bumdes->id,'produk');

					$updateHit = BumdesProduk::where('id', $bumdes->id)->update(['hit'=> $bumdes->hit + 1]);

          return view('frontend.bumdes.produk.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

    }

		//potensi desa

		public function potensiDesa(PotensiKategori $PotensiKategori){

			try{

				$data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['list'] = $PotensiKategori->potensi()->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);

				$data['count'] = $PotensiKategori->potensi()->count();

				return view('frontend.potensi.list', $data);

			}catch(\Exception $e){

				return back();

			}

		}

		public function potensiDesaDetail($slug){

			try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

					$detail = PotensiList::where('slug',$slug)->first();

          $data['detail'] = $detail;

          $data['komentar'] = $this->getComments($detail->id,'potensi');

					$updateHit = PotensiList::where('id', $detail->id)->update(['hit'=> $detail->hit + 1]);

          return view('frontend.potensi.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

		}

		//program desa

		public function programDesa(ProgramKategori $ProgramKategori){

			try{

				$data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

				$data['list'] = $ProgramKategori->program()->where('status', 'show')->orderby('created_at', 'DESC')->paginate(10);

				$data['count'] = $ProgramKategori->program()->count();

				return view('frontend.program.list', $data);

			}catch(\Exception $e){

				return back();

			}

		}

		public function programDesaDetail($slug){

			try{

          $data['berita'] = Berita::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['agenda'] = Agenda::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

          $data['pengumuman'] = Pengumuman::where('desa_id',Session::get('desa_id'))->where('status', 'show')->limit(5)->get();

					$detail = ProgramList::where('slug',$slug)->first();

          $data['detail'] = $detail;

          $data['komentar'] = $this->getComments($detail->id,'program');

					$updateHit = ProgramList::where('id', $detail->id)->update(['hit'=> $detail->hit + 1]);

          return view('frontend.program.detail', $data);

      }catch(\Exception $e){

          return redirect()->back();

      }

		}

		//perangkat desa

		public function kades(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->first();

          return view('frontend.pemdes.kades', $data);

      }catch(\Exception $e){

          return back();

      }

    }

		public function kantor(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->first();

          return view('frontend.pemdes.kantor', $data);

      }catch(\Exception $e){

          return back();

      }

    }

		public function perangkat(){

      try{

          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->get();

					$data['pegawai'] = PerangkatDesa::where('desa_id', Session::get('desa_id'))->where('status', 'show')->get();

          return view('frontend.pemdes.perangkat', $data);

      }catch(\Exception $e){

          return back();

      }

    }

		public function struktur(){

      try{
          $data['profil'] = ProfilDesa::where('id', Session::get('desa_id'))->first();
          $data['organisasi'] = StrukturOrganisasi::where('desa_id', Session::get('desa_id'))->first();                   
          return view('frontend.pemdes.struktur-organisasi', $data);
      }catch(\Exception $e){
          return back();
      }

    } 



    public function progress(){



      $data['suket_id'] = '';

      $data['jenis_suket'] = '';

      $data['progress'] = [];

      return view ('frontend.progress',$data);



    }

    public function listprogress(){
      $id = Auth::user()->id;
      $query = "SELECT id as id, created_at as tanggal, 'sku' as jenis_suket, 'S.K. Usaha' as category FROM ds_sk_usaha where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'sksj' as jenis_suket, 'S.K. Sapu Jagat' as category FROM ds_sk_sapu_jagat where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skp' as jenis_suket, 'S.K. Penghasilan' as category FROM ds_sk_penghasilan where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skrt' as jenis_suket, 'S.K. Riwayat Tanah' as category FROM ds_sk_riwayat_tanah where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skn' as jenis_suket, 'S.K. Status Pernikahan' as category FROM ds_sk_nikah where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skm' as jenis_suket, 'S.K. Kematian' as category FROM ds_sk_kematian where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skk' as jenis_suket, 'S.K. Kelahiran' as category FROM ds_sk_kelahiran where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skbn' as jenis_suket, 'S.K. Beda Nama' as category FROM ds_sk_beda_nama where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'sktm' as jenis_suket, 'S.K. Tidak Mampu' as category FROM ds_sktm where user_id='$id'
                UNION ALL
                SELECT id as id, created_at as tanggal, 'skaw' as jenis_suket, 'S.K. Ahli Waris' as category FROM ds_sk_ahli_waris where user_id='$id'  
                order by tanggal desc              
                limit 10";
      $data['suket'] = DB::select($query);
      $data['id'] = $id;      
      return view ('frontend.listprogress',$data);
    }

    public function lihatProgress($id,$jenis_suket)
    {
      try{  
          $id = base64_decode($id);
          $data['progress'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->get();
          $data['user'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','user')->first();
          $data['operator'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','operator')->first();
          $data['kasi'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','kasi')->first();
          $data['sekdes'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','sekdes')->first();
          $data['kades'] = LogSuket::where('suket_id',$id)->where('jenis_suket',$jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','kades')->first();
          $data['suket'] = $jenis_suket;
          $data['jenis_suket'] = $jenis_suket;
          $data['suket_id'] = $id;
          return view('frontend.progress', $data);
      }catch(\QueryBuilder $e){
          toastr()->error($e->getMessage().'error');
          return back();
      }
    }

    public function cekProgress(Request $request)
    {
      try{
        $rules = [
          'suket_id' => 'required',
          'jenis_suket' => 'required',
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max karakter/digit',
            'min' => ':attribute maksimal :min karakter',
            'mimes' => 'format :attribute salah',
        ];



        $label = [

          'suket_id' => 'Id Surat',

          'jenis_suket' => 'Kategori Surat',

        ];



        $this->validate($request,$rules,$messages,$label);



          $data['suket_id'] = $request->suket_id;

          $data['jenis_suket'] = $request->jenis_suket;

          $data['progress'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->get();

          $data['user'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','user')->first();

          $data['operator'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','operator')->first();

          $data['kasi'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','kasi')->first();

          $data['sekdes'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','sekdes')->first();

          $data['kades'] = LogSuket::where('suket_id',$request->suket_id)->where('jenis_suket',$request->jenis_suket)->where('desa_id',Session::get('desa_id'))->where('keterangan','kades')->first();

          return view('frontend.progress', $data);

      }catch(\QueryBuilder $e){

          toastr()->error($e->getMessage().'error');

          return back();

      }



    }



    public function komentar(Request $request)

    {

      try{

        $rules = [

          'nama' => 'required|max:150',

          'email' => 'required|max:150',

          'komentar' => 'required',

        ];

    



        $messages = [

            'required' => ':attribute tidak boleh kosong',

            'max' => ':attribute maksimal :max karakter',

            'min' => ':attribute maksimal :min karakter',

        ];



        $label = [

            'nama' => 'Nama',

            'email' => 'Email',

            'komentar' => 'Komentar',

        ];



        $this->validate($request,$rules,$messages,$label);



        $data= [

          'desa_id' => Session::get('desa_id'),

          'informasi_id' => $request->info_id,

          'kategori' => $request->kategori,

          'nama' => $request->nama,

          'email' => $request->email,

          'komentar' => $request->komentar,

        ];



        $komentar = Komentar::create($data);



        toastr()->success('komentar anda berhasil dikirm, selanjutnya akan ditanjau terlebih dahulu oleh admin','Sukses');

        return back();



      }catch(\QueryBuilder $e){

          toastr()->error($e->getMessage().'error');

          return back();

      }

    }



    public function print($suket_id,$jenis_suket)

    {
        try{
			$suket_id = base64_decode($suket_id);

            if($jenis_suket == 'sktm'){

              $surat = SKTM::find($suket_id);

            }elseif($jenis_suket == 'skn'){

              $surat = SKN::find($suket_id);



            }elseif($jenis_suket == 'skp'){

              $surat = SKP::find($suket_id);



            }elseif($jenis_suket == 'sku'){

              $surat = SKU::find($suket_id);



            }elseif($jenis_suket == 'skm'){

              $surat = SKM::find($suket_id);



            }elseif($jenis_suket == 'skk'){

              $surat = SKK::find($suket_id);



            }elseif($jenis_suket == 'skaw'){

              $surat = SKAW::find($suket_id);



            }elseif($jenis_suket == 'skrt'){

              $surat = SKRT::find($suket_id);



            }elseif($jenis_suket == 'skbn'){

              $surat = SKBN::find($suket_id);



            }else{

              $surat = SKSJ::find($suket_id);

            }

            // set_time_limit(500);

            $dokumen = \App\Models\Dokumen::where('suket_id',$surat->id)->where('jenis',$jenis_suket)->first();
            if(!$dokumen){
                toastr()->error('Surat tidak ditemukan','error');
                return redirect()->back();
            }

            $namaFile = $dokumen->dokumen;

            return response()->download(public_path('storage/surat/'.$jenis_suket.'/'.$namaFile));

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function printWebView(Request $request)

    {

        

        try{
        	$request->suket_id = base64_decode($request->suket_id);

          $user = User::where('api_token',$request->token)->first();

          if(empty($user)){

            toastr()->error('User tidak ditemukan','Gagal');

            return back();

          }



            if($request->jenis_suket == 'sktm'){

              $surat = SKTM::find($request->suket_id);

            }elseif($request->jenis_suket == 'skn'){

              $surat = SKN::find($request->suket_id);



            }elseif($request->jenis_suket == 'skp'){

              $surat = SKP::find($request->suket_id);



            }elseif($request->jenis_suket == 'sku'){

              $surat = SKU::find($request->suket_id);



            }elseif($request->jenis_suket == 'skm'){

              $surat = SKM::find($request->suket_id);



            }elseif($request->jenis_suket == 'skk'){

              $surat = SKK::find($request->suket_id);



            }elseif($request->jenis_suket == 'skaw'){

              $surat = SKAW::find($request->suket_id);



            }elseif($request->jenis_suket == 'skrt'){

              $surat = SKRT::find($request->suket_id);



            }elseif($request->jenis_suket == 'skbn'){

              $surat = SKBN::find($request->suket_id);



            }else{

              $surat = SKSJ::find($request->suket_id);

            }

            // set_time_limit(500);

            $dokumen = \App\Models\Dokumen::where('suket_id',$surat->id)->where('jenis',$request->jenis_suket)->first();
            if(!$dokumen){
                toastr()->error('Surat tidak ditemukan','error');
                return redirect()->back();
            }

            $namaFile = $dokumen->dokumen;

            return response()->download(public_path('storage/surat/'.$request->jenis_suket.'/'.$namaFile));

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function sitemap()

    {

        $data['berita'] = Berita::where('status','show')->orderBy('created_at','asc')->get();

        $data['agenda'] = Agenda::where('status','show')->orderBy('start_date','asc')->get();

        $data['foto'] = Foto::where('status','show')->orderBy('created_at','asc')->get();

        $data['video'] = Video::where('status','show')->orderBy('created_at','asc')->get();

        $data['infoGrafis'] = InfoGrafis::where('status','show')->orderBy('created_at','asc')->get();

        $data['pengumuman'] = Pengumuman::where('status','show')->orderBy('created_at','asc')->get();



        return response()->view('frontend.sitemap',$data)->header('Content-Type', 'text/xml');

    }



    public function cari(Request $request)

    {

          $keyword = $request->input('keyword');

          $query = "SELECT id,title,slug,img,short_content as content, 'berita' as tabel  FROM ds_berita where   title like '%$keyword%' or content like '%$keyword%'

                  UNION ALL

                  SELECT id,title,slug,img,short_description as content, 'agenda' as tabel  FROM ds_agenda where   title like '%$keyword%' or description like '%$keyword%' 

                  UNION ALL 

                  SELECT id,title,slug,img, short_description as content,'pengumuman' as tabel FROM ds_pengumuman where title like '%$keyword%' or description like '%$keyword%'

                  UNION ALL

                  SELECT id,title,slug,img, description as content,'infografis' as tabel FROM ds_infografis where title like '%$keyword%' or description like '%$keyword%'

                  limit 10";

        $data['results'] = DB::select($query);

        $data['keyword'] = $keyword;

        return view('frontend.pencarian',$data);

    }

public function dokPdfView($jenis_suket,$no_surat)
    {
      try{
      	$no_surat = base64_decode($no_surat);

        if($jenis_suket == 'sktm'){

          $surat = SKTM::where('id',$no_surat)->first();

        }elseif($jenis_suket == 'skn'){

          $surat = SKN::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skp'){

          $surat = SKP::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'sku'){

          $surat = SKU::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skm'){

          $surat = SKM::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skk'){

          $surat = SKK::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skaw'){

          $surat = SKAW::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skrt'){

          $surat = SKRT::where('id',$no_surat)->first();



        }elseif($jenis_suket == 'skbn'){

          $surat = SKBN::where('id',$no_surat)->first();



        }else{

          $surat = SKSJ::where('id',$no_surat)->first();

        }

        // set_time_limit(500);

        $namaFile = \App\Models\Dokumen::where('suket_id',$surat->id)->first();
        $pathFile = public_path('storage/surat/'.$jenis_suket.'/'.$namaFile->dokumen);
        $url = url('storage/surat/'.$jenis_suket.'/'.$namaFile->dokumen);
        $validasi = (new ValidasiDokumenAction)->run($pathFile,$namaFile->dokumen);
        $result = json_decode($validasi);
        if(!empty($result->summary)){
          $data['result'] = $result;
          $data['url'] = $url;
          $data['signer'] = $result->details[0]->info_signer;
          $data['dokumen'] = $result->details[0]->signature_document;
        }

        return view('frontend.validasi',$data);

    }catch(\QueryBuilder $e){

        toastr()->error($e->getMessage(),'Gagal');

        return back();

    }
    }

}



