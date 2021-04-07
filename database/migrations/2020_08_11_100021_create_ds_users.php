<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_users', function (Blueprint $table) {
            $table->string('id',50)->index();
            $table->string('nik',16)->unique();
            $table->string('nama_lengkap',150);
            $table->string('password',150);
            $table->string('no_telpon',13);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->text('alamat');
            $table->string('otp',4)->unique();
            $table->enum('is_verified',[1,0])->default(0);
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
        Schema::dropIfExists('ds_users');
    }
}
