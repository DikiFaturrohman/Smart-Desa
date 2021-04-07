<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsDownload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_download', function (Blueprint $table) {
            $table->string('id',50)->index();
            $table->string('desa_id',50);
            $table->foreign('desa_id')->references('id')->on('ds_desa');
            $table->string('title',191);
            $table->text('description')->nullable();
            $table->string('slug',191);
            $table->string('file',191);
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
        Schema::dropIfExists('ds_download');
    }
}
