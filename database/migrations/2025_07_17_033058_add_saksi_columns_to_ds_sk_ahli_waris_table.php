<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaksiColumnsToDsSkAhliWarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ds_sk_ahli_waris', function (Blueprint $table) {
            // Menambahkan kolom setelah kolom 'alamat' agar rapi
            $table->string('nama_saksi1')->nullable()->after('alamat');
            $table->string('nik_saksi1', 16)->nullable()->after('nama_saksi1');
            $table->string('nama_saksi2')->nullable()->after('nik_saksi1');
            $table->string('nik_saksi2', 16)->nullable()->after('nama_saksi2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ds_sk_ahli_waris', function (Blueprint $table) {
            $table->dropColumn(['nama_saksi1', 'nik_saksi1', 'nama_saksi2', 'nik_saksi2']);
        });
    }
}
