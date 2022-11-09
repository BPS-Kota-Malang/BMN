<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;
    protected $table = "kondisi_products";
    protected $guarded=['id'];
    protected $fillable=['kode_kondisi','jenis_kondisi'];

    // public function barang()
    // {
    //     return $this->hasMany(Product::class);
    // }

    // public function status()
    // {
    //     return $this->belongsTo(StatusProduct::class, 'id_statusproduct');
    // }
    // public function nonaktif()
    // {
    //     return $this->belongsTo(NonaktifProduct::class);
    // }
}
