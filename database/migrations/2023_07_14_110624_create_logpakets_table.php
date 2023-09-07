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
        Schema::create('logpaket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pakets_id');
            $table->string('paket_sebelumnya');
            $table->unsignedBigInteger('tempo_id')->nullable();
            $table->decimal('harga', 8, 2);
            $table->integer('status')->default(0);
            $table->string('keterangan');
            $table->timestamps();

            
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
        Schema::dropIfExists('logpaket');
    }
};
