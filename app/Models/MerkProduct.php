<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkProduct extends Model
{
    use HasFactory;
    protected $table = "merk_products";
    protected $guarded=['id'];
    protected $fillable=['kode_merk','nama_merkbarang'];

    public function barang()
    {
        return $this->hasMany(Product::class);
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
