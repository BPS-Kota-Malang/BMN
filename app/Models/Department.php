<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=['kode_departemen','nama_departemen'];

    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(BorrowProduct::class);
    }
}
