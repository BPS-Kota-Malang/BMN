<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRoom extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "borrow_rooms";
    protected $fillable= ['kode_peminjaman', 'nama_peminjam', 'petugas', 'deskripsi', 'tanggal_pinjam', 'tanggal_selesai', 'tgl_selesai', 'status', 'id_room', 'id_building'];

    public function ruangan()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    public function gudang()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'petugas');

    }
}
