<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsProfilDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_profil_desa', function (Blueprint $table) {
            $table->string('id',50)->index();
            $table->string('nama',150)->unique();
            $table->string('foto_desa',150)->nullable();
            $table->string('kades',150);
            $table->string('foto_kades',150)->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('no_telpon');
            $table->string('alamat');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('ds_profil_desa');
    }
}
