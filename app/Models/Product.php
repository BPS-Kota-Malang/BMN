<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "products";
    protected $fillable= ['kode_barang', 'serial_number', 'nama_barang', 'id_productcategory', 'jumlah', 'keterangan', 'id_statusproduct', 'id_kondisi','id_merkproduct', 'tanggal_input'];

    public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'id_productcategory');
    }

    // public function ruangan()
    // {
    //     return $this->belongsTo(Room::class, 'id_room');
    // }




    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'id_kondisi');
    }
    public function status()
    {
        return $this->belongsTo(StatusProduct::class, 'id_statusproduct');
    }

    // public function nonaktif()
    // {
    //     return $this->belongsTo(NonaktifProduct::class);
    // }



    public function merek()
    {
        return $this->belongsTo(MerkProduct::class, 'id_merkproduct');
    }



    public function servis()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(BorrowProduct::class);
    }
}
