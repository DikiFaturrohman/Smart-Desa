<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsSuketLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_suket_log', function (Blueprint $table) {
            $table->string('id',50)->index();
            $table->string('desa_id',50);
            $table->foreign('desa_id')->references('id')->on('ds_desa');
            $table->string('suket_id',50);
            $table->string('jenis_suket');
            $table->string('pesan');
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
        Schema::dropIfExists('ds_suket_log');
    }
}
