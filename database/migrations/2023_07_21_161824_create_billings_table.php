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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan_id');
            $table->unsignedBigInteger('pakets_id');
            $table->unsignedBigInteger('tempo_id')->nullable();
            $table->decimal('harga', 8, 2);
            $table->timestamps();


            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans')->onDelete('cascade');
            $table->foreign('tempo_id')->references('id')->on('tanggaltempo')->onDelete('cascade');
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
        Schema::dropIfExists('billing');
    }
};
