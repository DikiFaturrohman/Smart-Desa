<?php



namespace App\Http\Controllers;



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\View;

use Illuminate\Routing\Controller as BaseController;

use App\Traits\HashId;

use App\Traits\AutoNumber;
use App\Traits\AutoNumberAdmin;

use App\Models\LogSuket;

use App\Models\Notifikasi;

use App\Models\NotifikasiAdmin;

use App\Models\OneSignal;

use App\Models\Komentar;

use App\Models\PotensiKategori;

use App\Models\ProgramKategori;

use App\Models\Admin;

use Session;

class Controller extends BaseController

{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HashId, AutoNumber,AutoNumberAdmin;

	public $kunci = 'Sm4r7D3s42020';

	function __construct()

    {
        $this->setUsers();
        
        View::share('visitors', $this->getAllVisitors());

        View::share('visitorToday', $this->getVisitorsToday());

        View::share('userOnline', $this->getUserOnline());

        View::share('hitToday', $this->hitToday());

        View::share('totalHit', $this->totalHit());

        // View::share('website', \App\Models\Website::first());

        // View::share('profile', $this->getProfil());

        // View::share('slider', $this->getSlider());

        // View::share('lokasi', $this->getLokasi()); 

        // View::share('potensi', $this->getPotensi());

      	// View::share('program', $this->getProgram());

    }



    public function getIdDesa()

    {

        //$desaId = '20190130984';

      	$desaId = '20190130949';

        return $desaId;

    }



    public function getIdKecamatan()

    {

        //$desaId = '2018110602412';

      	$desaId = '2018110602409';

        return $desaId;

    }



    public function getIdKota()

    {

        $desaId = '20190101173';

        return $desaId;

    }



    public function getIdProvinsi()

    {

        $desaId = '20180416009';

        return $desaId;

    }



    public function suketLogNotifikasi($suket,$jenis_suket,$judul,$konten,$ket,$status)

    {

        $log = LogSuket::create([

            'id' => $this->generateAutoNumber('ds_suket_log'),

            'desa_id' => $suket->desa_id,

            'suket_id' => $suket->id,

            'jenis_suket' => $jenis_suket,

            'pesan' => $konten,

            'keterangan' => $ket,

            'status' => $status,

        ]);



        $notifikasi = Notifikasi::create([

            'pengguna' => $suket->user_id,

            'judul' => $judul,

            'deskripsi' => $konten,

            'photo' => 'default.jpg',

            'tanggal' => \Carbon\Carbon::now(),

        ]);



        $user = OneSignal::where('iduser',$suket->user_id)->first();

        if(!empty($user)){

            $onesignal = $this->kirim_onesignal($judul,$konten,array($user->idonesignal));

            return $onesignal;

        }

    }





	public function kirim_onesignal($judul='',$konten='',$player_id='')

    {

    

        $heading = array("en" => $judul);

        $content = array("en" => $konten);

    

        $fields = array(

            'app_id' => "29952693-5746-4bb6-a82a-a98606462846",

            'include_player_ids' => $player_id,

            'contents' => $content,

            'headings' => $heading

        );

    

        $fields = json_encode($fields);

    

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',

                                                   'Authorization: Basic YzQzYTQ3NzUtOTgyYS00ZDRmLWFmNWEtZmM4YjA5Yzc1M2Zj'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    

        $response = curl_exec($ch);

        curl_close($ch);

    

        return $response;

    }



    public function getSlider(){
		$slider = \App\Models\Slider::where('desa_id', Session::get('desa_id'))->where('status', 'show')->get();

		return $slider;

    }

    

    public function getPotensi(){

		$potensi = \App\Models\PotensiKategori::where('desa_id', Session::get('desa_id'))->where('status', 'show')->get();

		return $potensi;

	}

  

    public function getLokasi(){

		$lokasi = \App\Models\Desa::where('id', Session::get('desa_id'))->first();

		return $lokasi;

	}

  

  	public function getProgram(){

		$program = \App\Models\ProgramKategori::where('desa_id', Session::get('desa_id'))->where('status', 'show')->get();

		return $program;

	}



	public function setUsers()

    {

       $date = \Carbon\Carbon::now()->format('Y-m-d');

       $ip = \Request::ip();

       $time = time();



       $data = [

           'ip' => $ip,

           'date' => $date,

           'online' => $time,

           'hit' => 1

       ];



       $user = \App\Models\Visitor::where('ip',$ip)->where('date',$date)->get();

       if(count($user) == 0){

            $insertUser = \App\Models\Visitor::insert($data);

       }else{

            $data['hit'] = $user[0]->hit + 1;

            $updateUser = \App\Models\Visitor::where('ip',$ip)->where('date',$date)->update($data);

       }

    }



    public function getAllVisitors()

    {

        $visitors = \App\Models\Visitor::count('ip');

        return $visitors;

    }



    public function getVisitorsToday()

    {

        $visitorToday = \App\Models\Visitor::where('date',\Carbon\Carbon::now()->format('Y-m-d'))->count();

        return $visitorToday;

    }



    public function getUserOnline()

    {

        $time = time() - 300;

        $userOnline = \App\Models\Visitor::where('online','>',$time)->count();

        return $userOnline;

    }



    public function getProfil()

    {

        $profil = \App\Models\ProfilDesa::where('id', Session::get('desa_id'))->get();

        return $profil;

    }



    public function hitToday()

    {

        $hitToday = \App\Models\Visitor::where('date',\Carbon\Carbon::now()->format('Y-m-d'))->sum('hit');

        return $hitToday;

    }



    public function totalHit()

    {

        $totalHit = \App\Models\Visitor::sum('hit');

        return $totalHit;

    }



    public function kirimSms($suket,$phone,$keterangan)

    {

        $url = route('frontend.progress');

        $message ='Pengajuan '.$keterangan.' berhasil. dengan id surat : '.$suket->id.'. selanjutnya akan ditinjau dan diverifikasi oleh pihak desa. untuk melihat progres bisa buka di '.$url;



        $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);



        $response = curl_exec ($ch);

        $err = curl_error($ch);

        curl_close ($ch);

    }



    public function getComments($info_id,$kategori)

    {

       $komentar = Komentar::where('informasi_id',$info_id)->where('kategori',$kategori)->where('status',1)->get();

       return $komentar;

    }



    public function logNotifikasiAdmin($admin_id,$judul,$konten)

    {

        $notifikasi = NotifikasiAdmin::create([

            'admin_id' => $admin_id,

            'judul' => $judul,

            'deskripsi' => $konten,

            'photo' => 'default.jpg',

            'tanggal' => \Carbon\Carbon::now(),

        ]);



        $user = OneSignal::where('iduser',$admin_id)->first();

        if(!empty($user)){

            $onesignal = $this->kirim_onesignal($judul,$konten,array($user->idonesignal));

            return $onesignal;

        }

    }



    public function getAdmin($role,$desa_id)

    {

        $admin = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')

                    ->select('ds_admins.id as id')

                    ->where('ds_admins.desa_id',$desa_id)

                    ->where('ds_admin_roles.role_id',$role)->first();

        return $admin->id;

    }



    public function updateNotifikasi($suket_id,$jenis,$pesan,$desa_id)

    {

        $logOperator = LogSuket::where('suket_id',$suket_id)->where('jenis_suket',$jenis)->where('keterangan','operator')->where('status','tolak')->where('desa_id',$desa_id)->delete();



        $logUser = LogSuket::where('suket_id',$suket_id)->where('jenis_suket',$jenis)->where('keterangan','user')->where('desa_id',$desa_id)->first();

        $logUser->update(['pesan' => $pesan]);



        $admin = Admin::join('ds_admin_roles','ds_admin_roles.admin_id','=','ds_admins.id')->select('ds_admins.id as admin_id')->where('ds_admin_roles.role_id','operator')->where('ds_admins.desa_id',$desa_id)->first();

        $user = OneSignal::where('iduser',$admin->admin_id)->first();

        if(!empty($user)){

            $judul = 'Pengajuan';

            $onesignal = $this->kirim_onesignal($judul,$pesan,array($user->idonesignal));

            return $onesignal;

        }

    }

   public function cekPassphrase($admin_id,$passphrase){
        $result = \App\Models\Passphrase::where('admin_id',$admin_id)->where('passphrase',$passphrase)->first();
        return $result;
    }

}

