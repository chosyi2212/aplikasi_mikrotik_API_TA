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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id');
            $table->string('infoice_id');
            $table->unsignedBigInteger('tanggaltempo_id')->nullable();
            $table->string('pelanggan_id');
            $table->unsignedBigInteger('pakets_id');
            $table->decimal('harga', 8, 2);
            $table->string('status')->default('0');
            $table->timestamps();

            $table->foreign('tanggaltempo_id')->references('id')->on('tanggaltempo')->onDelete('cascade');
            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans')->onDelete('cascade');
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
        Schema::dropIfExists('transaksi');
    }
};
