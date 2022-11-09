<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kondisi');
            // $table->integer('id_statusproduct');
            $table->string('jenis_kondisi');
            // $table->foreign('id_statusproduct')->references('id')->on('status_products');
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
        Schema::dropIfExists('kondisi_products');
    }
}
