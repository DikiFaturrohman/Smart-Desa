<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ds_sk_kelahiran', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_sk_kelahiran');
            $table->string('file_surat_nikah');
            $table->string('file_kk');
            $table->string('file_ayah');
            $table->string('file_ibu');
        });

        Schema::table('ds_sk_kematian', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_ktp_alm');
            $table->string('file_ktp_pelapor');
            $table->string('file_ktp_saksi');
            $table->string('file_sk_rs')->nullable();
        });

        Schema::table('ds_sk_usaha', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_sp_rtrw');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_surat_pernyataan');
        });

        Schema::table('ds_sk_beda_nama', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_sp_rtrw');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_surat_pernyataan');
        });

        Schema::table('ds_sktm', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_sp_rtrw');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_surat_pernyataan');
        });

        Schema::table('ds_sk_penghasilan', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('slip_gaji');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_surat_pernyataan');
        });

        Schema::table('ds_sk_nikah', function (Blueprint $table) {
            $table->string('no_hp');
            $table->string('file_sp_rtrw');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->string('file_akta_cerai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ds_sk_kelahiran', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_sk_kelahiran');
            $table->dropColumn('file_surat_nikah');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_ayah');
            $table->dropColumn('file_ibu');
        });

        Schema::table('ds_sk_kematian', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_ktp_alm');
            $table->dropColumn('file_ktp_pelapor');
            $table->dropColumn('file_ktp_saksi');
            $table->dropColumn('file_sk_rs')->nullable();
        });

        Schema::table('ds_sk_usaha', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_sp_rtrw');
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_surat_pernyataan');
        });

        Schema::table('ds_sk_beda_nama', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_sp_rtrw');
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_surat_pernyataan');
        });

        Schema::table('ds_sktm', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_sp_rtrw');
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_surat_pernyataan');
        });

        Schema::table('ds_sk_penghasilan', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('slip_gaji');
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_surat_pernyataan');
        });

        Schema::table('ds_sk_nikah', function (Blueprint $table) {
            $table->dropColumn('no_hp');
            $table->dropColumn('file_sp_rtrw');
            $table->dropColumn('file_ktp');
            $table->dropColumn('file_kk');
            $table->dropColumn('file_akta_cerai');
        });
    }
}
