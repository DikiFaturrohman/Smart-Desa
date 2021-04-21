<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnggahDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_unggah_dokumens', function (Blueprint $table) {
            $table->string('id',50)->index()->primary();
            $table->string('user_id',50);
            $table->foreign('user_id')->references('id')->on('ds_users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('file_ktp',150);
            $table->string('file_kk',150);
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
        Schema::dropIfExists('unggah_dokumens');
    }
}
