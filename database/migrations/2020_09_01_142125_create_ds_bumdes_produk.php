<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsBumdesProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_bumdes_produk', function (Blueprint $table) {
          $table->string('id',50)->index();
          $table->string('bumdes_id',50);
          $table->foreign('bumdes_id')->references('id')->on('ds_bumdes_profil');
          $table->string('desa_id',50);
          $table->string('name',191);
          $table->string('description');
          $table->string('short_description',150);
          $table->string('slug',191);
          $table->string('img',191)->nullable();
          $table->enum('status',['show','hide'])->default('show');
          $table->bigInteger('hit')->default(0);
          $table->string('created_by',191)->nullable();
          $table->string('updated_by',191)->nullable();
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
        Schema::dropIfExists('ds_bumdes_produk');
    }
}
