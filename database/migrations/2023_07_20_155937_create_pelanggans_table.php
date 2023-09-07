<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan_id')->unique();
            $table->unsignedBigInteger('userpelanggans_id');
            $table->unsignedBigInteger('logpaket_id');
            $table->string('passpppoe');
            $table->unsignedBigInteger('pakets_id')->nullable();
            $table->string('alamat');
            $table->string('no_telfon');
            $table->integer('status')->default(0);
            $table->timestamps();


            $table->foreign('logpaket_id')->references('id')->on('logpaket')->onDelete('cascade');
            $table->foreign('userpelanggans_id')->references('id')->on('user_pelanggans')->onDelete('cascade');
            $table->foreign('pakets_id')->references('id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
};
