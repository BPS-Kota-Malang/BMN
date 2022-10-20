<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    protected $guarded=['id'];
    protected $fillable=['kode_kategori','nama_kategbarang'];

    public function barang()
    {
        return $this->hasMany(Product::class);
    }
}
