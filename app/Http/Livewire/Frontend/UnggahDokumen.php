<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;

class UnggahDokumen extends Component
{
    use WithFileUploads;
    
    public $file_kk;
    public $file_ktp;
    public $unggah;

    public function mount($unggah)
    {
        if($unggah){
           $this->unggah =  $unggah;
        }
    }

    public function upload()
    {
        dd($request->file_ktp);
    }

    public function render()
    {
        return view('livewire.frontend.unggah-dokumen');
    }
}
