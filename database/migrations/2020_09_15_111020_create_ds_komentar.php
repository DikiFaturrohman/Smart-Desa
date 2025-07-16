<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsKomentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_komentar', function (Blueprint $table) {
            $table->id();
            $table->string('informasi_id');
            $table->string('kategori');
            $table->string('nama',150);
            $table->string('email',150);
            $table->enum('status',[1,0])->default(0);
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
        Schema::dropIfExists('ds_komentar');
    }
}
