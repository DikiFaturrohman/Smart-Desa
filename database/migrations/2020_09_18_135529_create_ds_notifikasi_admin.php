<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsNotifikasiAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_notifikasi_admin', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->foreign('admin_id')->references('id')->on('ds_admins')->onUpdate('cascade');
            $table->string('judul',150);
            $table->string('deskripsi',250);
            $table->string('photo');
            $table->datetime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ds_notifikasi_admin');
    }
}
