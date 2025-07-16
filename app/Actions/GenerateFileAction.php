<?php
namespace App\Actions;

use App\Models\Desa;
use App\Models\ProfilDesa;
use App\Models\SKN;
use App\Models\SKP;
use App\Models\SKTM;
use App\Models\SKAW;
use App\Models\SKRT;
use App\Models\SKSJ;
use App\Models\SKU;
use App\Models\SKBN;
use App\Models\SKBNDetail;
use App\Models\SKK;
use App\Models\SKM;
use App\Models\Dokumen;
use PDF;

class GenerateFileAction {

    public function run($id,$tipe)
    {
        if($tipe == 'skk'){
            $tabel = SKK::find($id);
        }elseif($tipe == 'skm'){
            $tabel = SKM::find($id);

        }elseif($tipe == 'sku'){
            $tabel = SKU::find($id);
            
        }elseif($tipe == 'skbn'){
            $tabel = SKBN::find($id);
            
        }elseif($tipe == 'sktm'){
            $tabel = SKTM::find($id);
            
        }elseif($tipe == 'skp'){
            $tabel = SKP::find($id);
            
        }elseif($tipe == 'skn'){
            $tabel = SKN::find($id);
            
        }elseif($tipe == 'skrt'){
            $tabel = SKRT::find($id);
            
        }elseif($tipe == 'skaw'){
            $tabel = SKAW::find($id);
            
        }else{
            $tabel = SKSJ::find($id);   
        }

        $data[$tipe] = $tabel;
        $profil = ProfilDesa::with('desa.kecamatan')
                   ->find($tabel->desa_id);
        if ($profil) {
            // use the nested Desa model that has kecamatan loaded
            $desa = $profil->desa;
        } else {
            \Log::warning("No ProfilDesa for id {$tabel->desa_id}, using Desa instead");
            // fall back to your core Desa model, but eager-load kecamatan
            $desa = Desa::with('kecamatan')
                        ->findOrFail($tabel->desa_id);
        }
        $data['desa'] = $desa;
        $data['dataBenar'] = SKBNDetail::where('skbn_id',$data[$tipe]->id)->where('jenis_dok',$data[$tipe]->data_dok_benar)->first();
        $url = url('dokumen/'.$tipe.'/'.base64_encode($data[$tipe]->id).'/detail');
        $data['barcode'] = \QrCode::size(100)->generate($url);
        $pdf = PDF::loadView('backend.pdf.'.$tipe, $data);
        $output = $pdf->output();
        
        $dokumen = Dokumen::where('suket_id',$id)->where('jenis',$tipe)->first();
        if($dokumen){
            $namaFile = $dokumen->dokumen;
        }else{
            $namaFile = vsprintf('%s%s-%s-%s-%s-%s%s', str_split(bin2hex(random_bytes(16)), 4)).'.pdf';
            Dokumen::create([
                'suket_id' => $id,
                'jenis' => $tipe,
                'dokumen' => $namaFile
            ]);
        }
        
        \Storage::put('surat/'.$tipe.'/'.$namaFile,$output);
    }
}