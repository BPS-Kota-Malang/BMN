<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonaktifProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonaktif_products', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->double('jumlah');
            $table->date('tanggal_nonaktif');
            $table->timestamps();
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status_products');
            $table->unsignedBigInteger('id_lokasi');
            $table->foreign('id_lokasi')->references('id')->on('location_products');
            $table->unsignedBigInteger('id_merk');
            $table->foreign('id_merk')->references('id')->on('merk_products');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nonaktif_products');
    }
}
