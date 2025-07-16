<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsSkbnDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_skbn_detail', function (Blueprint $table) {
            $table->string('id',50)->index();
            $table->string('skbn_id',50);
            $table->foreign('skbn_id')->references('id')->on('ds_sk_beda_nama');
            $table->enum('jenis_dok',['ktp','sim','kk','ijazah','akta nikah',]);
            $table->string('nomor_dok',50);
            $table->string('nama_dok',50);
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
        Schema::dropIfExists('ds_skbn_detail');
    }
}
