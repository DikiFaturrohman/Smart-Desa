<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTableKasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ds_sktm', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_beda_nama', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_usaha', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_penghasilan', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_riwayat_tanah', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_ahli_waris', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_kematian', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_kelahiran', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_nikah', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });

        Schema::table('ds_sk_sapu_jagat', function (Blueprint $table) {
            $table->string('kasi_id')->after('verifikasi_kasi')->nullable();
            $table->foreign('kasi_id')->references('id')->on('ds_admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
