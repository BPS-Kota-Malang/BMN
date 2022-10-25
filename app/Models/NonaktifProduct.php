<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonaktifProduct extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "nonaktif_products";
    protected $fillable= ['kode_nonaktif', 'deskripsi','jumlah', 'tanggal_nonaktif', 'id_product', 'id_merk','id_lokasi','id_status' ];

    public function barang()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function merk()
    {
        return $this->belongsTo(MerkProduct::class, 'id_merk');
    }

    public function lokasi()
    {
        return $this->belongsTo(LocationProduct::class, 'id_lokasi');
    }

    public function status()
    {
        return $this->belongsTo(StatusProduct::class, 'id_status');
    }



}
