<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan');
            $table->string('nama_ruangan');
            $table->string('status_ruangan');
            $table->foreignId('id_roomcategory')->constrained('room_categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('id_building')->constrained('buildings')->onDelete('cascade')->onUpdate('cascade');
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


        Schema::dropIfExists('rooms');
    }
}
