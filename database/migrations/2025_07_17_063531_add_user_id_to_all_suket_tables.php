<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAllSuketTables extends Migration
{
    /**
     * Nama-nama tabel surat.
     *
     * @var array
     */
    protected $tables = [
        'ds_sk_usaha',
        'ds_sk_sapu_jagat',
        'ds_sk_penghasilan',
        'ds_sk_riwayat_tanah',
        'ds_sk_nikah',
        'ds_sk_kematian',
        'ds_sk_kelahiran',
        'ds_sk_beda_nama',
        'ds_sktm',
        'ds_sk_ahli_waris',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $tableName) {
            // Hanya tambahkan kolom jika tabel ada dan belum memiliki kolom 'user_id'
            if (Schema::hasTable($tableName) && !Schema::hasColumn($tableName, 'user_id')) {
                Schema::table($tableName, function (Blueprint $table) {
                    // Berdasarkan query, user_id adalah string. Sesuaikan jika tipe datanya lain.
                    // Menambahkan setelah kolom 'id' agar rapi.
                    $table->string('user_id')->nullable()->after('id');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $tableName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, 'user_id')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn('user_id');
                });
            }
        }
    }
};