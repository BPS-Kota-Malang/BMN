<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "rooms";
    protected $fillable= ['kode_ruangan', 'nama_ruangan', 'id_roomcategory',  'status_ruangan'];

    public function roomcategory()
    {
        return $this->belongsTo(RoomCategory::class, 'id_roomcategory');
    }

    // public function building()
    // {
    //     return $this->belongsTo(Building::class, 'id_building');
    // }

    public function peminjaman()
    {
        return $this->hasMany(BorrowRoom::class);
    }

    // public function barang()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
