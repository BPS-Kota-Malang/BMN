<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    use HasFactory;
    protected $table = "status_products";
    protected $guarded=['id'];
    protected $fillable=['kode_status','nama_statusbarang'];
    
    public function barang()
    {
        return $this->hasMany(Product::class);
    }

    public function nonaktif()
    {
        return $this->belongsTo(NonaktifProduct::class);
    }
}
