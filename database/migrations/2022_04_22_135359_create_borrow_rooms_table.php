<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman');
            $table->string('deskripsi');
            $table->string('status');
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_selesai');
            $table->date('tgl_selesai');
            $table->timestamps();
            $table->unsignedBigInteger('petugas');
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_user');
            $table->foreign('petugas')->references('id')->on('users');
            $table->foreign('id_room')->references('id')->on('rooms');
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_rooms');
    }
}
