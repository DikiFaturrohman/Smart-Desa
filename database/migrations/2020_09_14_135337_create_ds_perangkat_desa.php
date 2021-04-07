<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsPerangkatDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_perangkat_desa', function (Blueprint $table) {
          $table->string('id',50)->index();
          $table->string('desa_id',50);
          $table->foreign('desa_id')->references('id')->on('ds_desa');
          $table->string('name',191);
          $table->string('nip',150)->nullable();
          $table->string('birth_place',150);
          $table->date('birth_date');
          $table->string('phone',150);
          $table->string('address',191);
          $table->string('position',191);
          $table->string('img',191)->nullable();
          $table->string('golongan',150);
          $table->enum('status',['show','hide'])->default('show');
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
        Schema::dropIfExists('ds_perangkat_desa');
    }
}
