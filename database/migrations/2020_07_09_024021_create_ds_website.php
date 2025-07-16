<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsWebsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_website', function (Blueprint $table) {
            $table->id();
            $table->string('desa_id',50);
            $table->foreign('desa_id')->references('id')->on('ds_desa');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->text('meta_description');
            $table->string('favicon')->nullable();
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
        Schema::dropIfExists('ds_website');
    }
}
