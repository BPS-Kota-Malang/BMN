<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationProduct extends Model
{
    use HasFactory;
    protected $table = "location_products";
    protected $guarded=['id'];
    protected $fillable=['kode_lokasi','nama_lokasibarang'];

    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(BorrowProduct::class);
    }
}
