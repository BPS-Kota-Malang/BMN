<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "products";
    // protected $fillable= ['kode_barang', 'nama_barang', 'id_productcategory', 'id_department', 'harga_beli', 'jumlah', 'satuan', 'id_statusproduct', 'id_merkproduct', 'tanggal_input'];

    protected $fillable= ['kode_barang', 'nama_barang', 'id_productcategory',  'harga_beli', 'jumlah', 'satuan', 'id_statusproduct', 'id_merkproduct', 'tanggal_input'];

    public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'id_productcategory');
    }

    // public function ruangan()
    // {
    //     return $this->belongsTo(Room::class, 'id_room');
    // }

    // public function departemen()
    // {
    //     return $this->belongsTo(Department::class, 'id_department');
    // }

    public function status()
    {
        return $this->belongsTo(StatusProduct::class, 'id_statusproduct');
    }

    // public function nonaktif()
    // {
    //     return $this->belongsTo(NonaktifProduct::class);
    // }

    // public function lokasi()
    // {
    //     return $this->belongsTo(LocationProduct::class, 'id_lokasiproduct');
    // }

    public function merek()
    {
        return $this->belongsTo(MerkProduct::class, 'id_merkproduct');
    }

    // public function gudang()
    // {
    //     return $this->belongsTo(Building::class, 'id_gudang');
    // }

    public function servis()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(BorrowProduct::class);
    }
}
