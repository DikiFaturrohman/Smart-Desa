<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuketMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $suket;
    public $admin;
    public $ket;

    public function __construct($admin,$suket,$ket)
    {
        $this->admin = $admin;
        $this->suket = $suket;
        $this->ket = $ket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notifikasi Pengajuan Surat')->view('backend.email.suket');
    }
}
