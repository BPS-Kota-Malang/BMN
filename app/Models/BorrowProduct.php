<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowProduct extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "borrow_products";
    protected $fillable= ['kode_peminjaman','nama_peminjam', 'petugas', 'deskripsi', 'tanggal_pinjam', 'tanggal_kembali','tanggal_pengembalian','status', 'kondisi_setelahdipinjam','catatan','bukti_pengembalian','id_product', 'id_merk'];

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

    // public function departemen()
    // {
    //     return $this->belongsTo(Department::class, 'id_department');

    // }

    // public function gudang()
    // {
    //     return $this->belongsTo(Building::class, 'id_gudang');

    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user');

    // }

    public function admin()
    {
        return $this->belongsTo(User::class, 'petugas');

    }

    public function pengembalian()
    {
        return $this->hasOne(BuktiPengembalian::class);
    }


}
