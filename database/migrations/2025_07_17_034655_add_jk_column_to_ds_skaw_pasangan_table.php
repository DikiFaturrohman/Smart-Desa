<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJkColumnToDsSkawPasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ds_skaw_pasangan', function (Blueprint $table) {
            // Menambahkan kolom 'jk' setelah kolom 'pekerjaan_id'
            $table->string('jk', 20)->nullable()->after('pekerjaan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ds_skaw_pasangan', function (Blueprint $table) {
            $table->dropColumn('jk');
        });
    }
}
