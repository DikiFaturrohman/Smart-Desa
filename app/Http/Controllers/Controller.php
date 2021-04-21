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

}

